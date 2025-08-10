import React, { useEffect, useMemo, useRef, useState } from "react";

/* ====== Constantes ====== */
const Z_PROB = 1.645;   // 90%
const TARGET_ERR = 10;  // %

/* ====== Utils ====== */
const safeParse = (v) => { try { return JSON.parse(v ?? "null"); } catch { return null; } };
const fmtNum = (x, d = 2) =>
  Number.isFinite(+x)
    ? Number(x).toLocaleString("pt-BR", { minimumFractionDigits: d, maximumFractionDigits: d })
    : "-";

/* Contexto ativo (projeto/talhão/estrato) lido do sessionStorage */
function getActiveContext() {
  const projeto = safeParse(sessionStorage.getItem("activeProject"));
  const talhoesMap = safeParse(sessionStorage.getItem("talhoes")) || {};
  const estratosMap = safeParse(sessionStorage.getItem("estratos")) || {};
  const talhaoId = sessionStorage.getItem("activeTalhaoId") || "";
  const estrIds = safeParse(sessionStorage.getItem("activeEstratoIds")) || [];

  const talhoes = talhoesMap[projeto?.id] || [];
  const talhao = talhoes.find((t) => t.id === talhaoId) || null;

  const estratos = estratosMap[talhaoId] || [];
  const estratoId = estrIds[0] || (estratos.find((e) => e.ativo)?.id || "");
  const estrato = estratos.find((e) => e.id === estratoId) || null;

  return { projeto, talhaoId, talhao, estratoId, estrato };
}

function keyParcelas(projectId, talhaoId, estratoId) {
  return `${projectId || "_"}:${talhaoId || "_"}:${estratoId || "_"}`;
}

/* ====== Estatística (90%) ====== */
function calcStats(rows) {
  const ativas = rows.filter((r) => r.ativo);
  const n = ativas.length;
  if (n === 0) return { media: 0, cv: 0, erro: 0, nParcelas: 0, nNec: 0 };

  const vols = ativas.map((r) => Number(r.volume) || 0);
  const mean = vols.reduce((a, b) => a + b, 0) / n;
  const variance = n > 1
    ? vols.reduce((acc, v) => acc + Math.pow(v - mean, 2), 0) / (n - 1)
    : 0;
  const sd = Math.sqrt(Math.max(variance, 0));
  const cv = mean !== 0 ? (sd / mean) * 100 : 0;            // %
  const erro = mean !== 0 ? (Z_PROB * cv) / Math.sqrt(n) : 0; // %
  const nNec = mean !== 0 && cv > 0 ? Math.ceil(((Z_PROB * cv) / TARGET_ERR) ** 2) : n;
  return { media: mean, cv, erro, nParcelas: n, nNec };
}

/* Série do gráfico: erro(n) = z * CV% / sqrt(n) */
function genErrorSeries(cv, maxN = 100, z = Z_PROB) {
  const pts = [];
  const N = Math.max(2, Math.min(500, maxN));
  for (let n = 2; n <= N; n++) {
    const err = z * (cv || 0) / Math.sqrt(n);
    pts.push({ n, err });
  }
  return pts;
}

/* ====== Componente ====== */
export default function InvAmostragem() {
  const [ctx, setCtx] = useState(getActiveContext());
  const { projeto, talhaoId, estratoId } = ctx;

  // Linhas (parcelas)
  const [rows, setRows] = useState(() => {
    const k = keyParcelas(ctx.projeto?.id, ctx.talhaoId, ctx.estratoId);
    const map = safeParse(sessionStorage.getItem("parcelas")) || {};
    if (Array.isArray(map[k])) return map[k];
    // seed visual
    return Array.from({ length: 12 }).map((_, i) => ({
      id: `P${String(i + 1).padStart(3, "0")}`,
      arvores: 10 + ((i * 3) % 15),
      volume: 8 + (i % 5) * 2 + (i / 10),
      ativo: true,
    }));
  });

  // Recarrega contexto/parcelas quando sessão muda (rota/tab/click em outras telas)
  useEffect(() => {
    const next = getActiveContext();
    setCtx(next);

    const k = keyParcelas(next.projeto?.id, next.talhaoId, next.estratoId);
    const map = safeParse(sessionStorage.getItem("parcelas")) || {};
    if (Array.isArray(map[k])) setRows(map[k]);
  }, [/* eslint-disable-line react-hooks/exhaustive-deps */]);

  // Redesenhar quando mudar tab (querystring) ou sessão — listener simples
  useEffect(() => {
    const onPop = () => setCtx(getActiveContext());
    window.addEventListener("popstate", onPop);
    return () => window.removeEventListener("popstate", onPop);
  }, []);

  const persistRows = (next) => {
    const k = keyParcelas(projeto?.id, talhaoId, estratoId);
    const map = safeParse(sessionStorage.getItem("parcelas")) || {};
    map[k] = next;
    sessionStorage.setItem("parcelas", JSON.stringify(map));
  };

  const toggleParcela = (id) => {
    const next = rows.map((r) => (r.id === id ? { ...r, ativo: !r.ativo } : r));
    setRows(next);
    persistRows(next);
  };

  const stats = useMemo(() => calcStats(rows), [rows]);

  /* ====== Gráfico (Canvas API) ====== */
  const canvasRef = useRef(null);
  useEffect(() => {
    const cvs = canvasRef.current;
    if (!cvs) return;

    const dpr = Math.max(window.devicePixelRatio || 1, 1);
    const cssW = cvs.clientWidth || 480;
    const cssH = cvs.clientHeight || 340;
    cvs.width = Math.floor(cssW * dpr);
    cvs.height = Math.floor(cssH * dpr);

    const ctx2d = cvs.getContext("2d");
    if (!ctx2d) return;

    ctx2d.setTransform(1, 0, 0, 1, 0, 0);
    ctx2d.scale(dpr, dpr);
    ctx2d.clearRect(0, 0, cssW, cssH);
    ctx2d.font = "12px Calibri, Arial, sans-serif";

    const maxN = Math.max(20, stats.nParcelas * 2, stats.nNec + 5);
    const series = genErrorSeries(stats.cv, maxN);

    const m = { l: 64, r: 16, t: 16, b: 48 };
    const W = Math.max(cssW - m.l - m.r, 10);
    const H = Math.max(cssH - m.t - m.b, 10);

    const xMin = 2;
    const xMax = series.length > 0 ? series[series.length - 1].n : 20;
    const yMaxData = Math.max(TARGET_ERR, ...series.map((p) => p.err));
    const yMax = Math.max(10, Math.ceil((yMaxData * 1.15) / 5) * 5);

    const X = (n) => m.l + ((n - xMin) / (xMax - xMin)) * W;
    const Y = (err) => m.t + (1 - err / yMax) * H;

    // Grade Y
    ctx2d.strokeStyle = "#e5e7eb";
    ctx2d.lineWidth = 1;
    ctx2d.textAlign = "right";
    for (let gy = 0; gy <= 5; gy++) {
      const yy = m.t + (gy / 5) * H;
      ctx2d.beginPath(); ctx2d.moveTo(m.l, yy); ctx2d.lineTo(m.l + W, yy); ctx2d.stroke();
      const val = yMax * (1 - gy / 5);
      ctx2d.fillStyle = "#6b7280";
      ctx2d.fillText(`${val.toFixed(0)}%`, m.l - 8, yy + 4);
    }

    // Ticks X
    ctx2d.fillStyle = "#6b7280";
    ctx2d.textAlign = "center";
    let stepX = Math.max(1, Math.round((xMax - xMin) / 8));
    for (let n = xMin; n <= xMax; n += stepX) ctx2d.fillText(String(n), X(n), m.t + H + 20);

    // Linha alvo
    ctx2d.strokeStyle = "#d97706";
    ctx2d.setLineDash([6, 6]);
    ctx2d.beginPath(); ctx2d.moveTo(m.l, Y(TARGET_ERR)); ctx2d.lineTo(m.l + W, Y(TARGET_ERR)); ctx2d.stroke();
    ctx2d.setLineDash([]);
    ctx2d.fillStyle = "#d97706";
    ctx2d.textAlign = "left";
    ctx2d.fillText(`Erro alvo ${TARGET_ERR}%`, m.l + 8, Y(TARGET_ERR) - 6);

    // Linha vertical n atual
    if (stats.nParcelas > 0) {
      ctx2d.strokeStyle = "#2563eb";
      ctx2d.beginPath(); ctx2d.moveTo(X(stats.nParcelas), m.t); ctx2d.lineTo(X(stats.nParcelas), m.t + H); ctx2d.stroke();
      ctx2d.fillStyle = "#2563eb";
      ctx2d.fillText(`n=${stats.nParcelas}`, X(stats.nParcelas) + 6, m.t + 14);
    }

    // Curva erro(n)
    if (series.length > 0) {
      ctx2d.strokeStyle = "#10b981";
      ctx2d.lineWidth = 2;
      ctx2d.beginPath();
      for (let i = 0; i < series.length; i++) {
        const { n, err } = series[i];
        const xx = X(n), yy = Y(err);
        if (i === 0) ctx2d.moveTo(xx, yy); else ctx2d.lineTo(xx, yy);
      }
      ctx2d.stroke();
    }

    // Eixos
    ctx2d.fillStyle = "#111";
    ctx2d.textAlign = "center";
    ctx2d.fillText("Número de parcelas (n)", m.l + W / 2, m.t + H + 40);
    ctx2d.save();
    ctx2d.translate(m.l - 48, m.t + H / 2);
    ctx2d.rotate(-Math.PI / 2);
    ctx2d.fillText("Erro de amostragem (%)", 0, 0);
    ctx2d.restore();
  }, [stats]);

  // Redesenhar no resize
  useEffect(() => {
    const onResize = () => {
      // força um pequeno update trocando referência do array (sem alterar dados)
      setRows((r) => r.slice());
    };
    window.addEventListener("resize", onResize);
    return () => window.removeEventListener("resize", onResize);
  }, []);

  /* ====== UI ====== */
  return (
    <div style={root}>
      {/* Cabeçalho de contexto */}
      <section style={card}>
        <div style={headerGrid}>
          <Field label="Projeto"><span>{ctx.projeto?.nome || "-"}</span></Field>
          <Field label="Talhão"><span>{ctx.talhao?.nome || ctx.talhaoId || "-"}</span></Field>
          <Field label="Estrato"><span>{ctx.estrato?.nome || ctx.estratoId || "-"}</span></Field>
        </div>
      </section>

      {/* Duas colunas: Tabela | Estatística + Gráfico */}
      <section style={twoCol}>
        <div style={card}>
          <h3 style={h3}>Parcelas</h3>
          <div style={{ overflowY: "auto", maxHeight: "60vh" }}>
            <table style={table}>
              <thead>
                <tr>
                  <Th>Ações</Th>
                  <Th>Parcela</Th>
                  <Th>Árvores</Th>
                  <Th>Volume</Th>
                </tr>
              </thead>
              <tbody>
                {rows.map((r) => (
                  <tr key={r.id} style={{ ...trLine, ...(r.ativo ? activeRow : null) }}>
                    <Td>
                      <button style={smallBtn} onClick={() => toggleParcela(r.id)}>
                        {r.ativo ? "Desativar" : "Ativar"}
                      </button>
                    </Td>
                    <Td>{r.id}</Td>
                    <Td>{r.arvores}</Td>
                    <Td>{fmtNum(r.volume)}</Td>
                  </tr>
                ))}
                {rows.length === 0 && (
                  <tr>
                    <Td colSpan={4} style={{ color: "#6b7280" }}>Nenhuma parcela.</Td>
                  </tr>
                )}
              </tbody>
            </table>
          </div>
        </div>

        <div style={card}>
          <h3 style={h3}>Estatística de Amostragem (90%)</h3>
          <div style={statsGrid}>
            <table style={tableStats}>
              <tbody>
                <tr><TdLabel>Média do Volume</TdLabel><TdValue>{fmtNum(stats.media)}</TdValue></tr>
                <tr><TdLabel>Coeficiente de Variação (CV%)</TdLabel><TdValue>{fmtNum(stats.cv)}</TdValue></tr>
                <tr><TdLabel>Erro de Amostragem (90%)</TdLabel><TdValue>{fmtNum(stats.erro)}</TdValue></tr>
                <tr><TdLabel>Número de Parcelas</TdLabel><TdValue>{stats.nParcelas}</TdValue></tr>
                <tr><TdLabel>Nº de Parcelas Necessárias (≤ {TARGET_ERR}%)</TdLabel><TdValue>{stats.nNec}</TdValue></tr>
              </tbody>
            </table>

            <div style={chartBox}>
              <canvas ref={canvasRef} style={canvasStyle} />
              <div style={hint}>
                erro(n) = z·CV%/√n, com z=1,645 (90%). Linha laranja = alvo {TARGET_ERR}%.
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

/* ====== Estilos (Calibri) ====== */
const root = {
  display: "grid",
  gap: 16,
  fontFamily: "Calibri, Arial, sans-serif",
};
const card = {
  background: "#fff",
  borderRadius: 12,
  padding: 16,
  boxShadow: "0 6px 20px rgba(0,0,0,0.08)",
  border: "1px solid #00000012",
};
const headerGrid = {
  display: "grid",
  gap: 12,
  gridTemplateColumns: "repeat(3, minmax(0, 1fr))",
};
const twoCol = {
  display: "grid",
  gap: 16,
  gridTemplateColumns: "minmax(260px, 340px) 1fr", // mais estável que "20% 1fr"
  alignItems: "start",
};
const h3 = { margin: 0, marginBottom: 10 };
const table = { width: "100%", borderCollapse: "collapse" };
const tableStats = { width: "100%", borderCollapse: "separate", borderSpacing: 0 };
const trLine = { borderBottom: "1px solid #f0f0f0" };
const activeRow = { background: "#e8f5e9" };
const smallBtn = {
  background: "#e5e5e5",
  color: "#2e4631",
  border: "none",
  borderRadius: 6,
  padding: "6px 12px",
  cursor: "pointer",
  fontFamily: "Calibri, Arial, sans-serif",
  fontWeight: 700,
};
const statsGrid = {
  display: "grid",
  gap: 32,
  gridTemplateColumns: "320px 1fr",
  alignItems: "start",
};
const chartBox = {
  width: "100%",
  minWidth: 320,
  height: 360,
  display: "grid",
  justifySelf: "stretch",
};
const canvasStyle = {
  width: "100%",
  height: 340,
  border: "1px solid #f3f4f6",
  borderRadius: 8,
  background: "#fff",
};

function Th({ children }) {
  return <th style={{ textAlign: "left", padding: "8px 6px", color: "#6b7280", fontSize: 12 }}>{children}</th>;
}
function Td({ children, colSpan }) {
  return <td colSpan={colSpan} style={{ padding: "8px 6px" }}>{children}</td>;
}
const TdLabel = ({ children }) => <td style={{ padding: "8px 10px", width: 280, color: "#374151" }}>{children}</td>;
const TdValue = ({ children }) => <td style={{ padding: "8px 10px", fontWeight: 700 }}>{children}</td>;
const hint = { marginTop: 8, fontSize: 12, color: "#6b7280" };

/* === Helpers faltantes === */
function Field({ label, children }) {
  return (
    <div style={{ display: "grid", gap: 6, fontFamily: "Calibri, Arial, sans-serif" }}>
      <Label>{label}</Label>
      {children}
    </div>
  );
}
function Label({ children }) {
  return (
    <div style={{ fontSize: 12, color: "#233", fontWeight: 600, fontFamily: "Calibri, Arial, sans-serif" }}>
      {children}
    </div>
  );
}
