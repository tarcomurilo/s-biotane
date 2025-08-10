import React, { useEffect, useMemo, useState } from "react";

/* ===== Paleta / tipografia ===== */
const forestGreen = "#2e4631";
const mossGreen   = "#6b8e23";
const stoneGray   = "#e9ecef";
const white       = "#fff";
const activePastel = "#cddfd3";     // verde escuro pastel (seleção)

const FONT = { fontFamily: "Calibri, Arial, sans-serif" };
const LS_KEY = "invproj_v4";

/* ===== Util ===== */
const two = (v) => (Number.isFinite(+v) ? (+v).toFixed(2) : "0.00");
const todayISO = () => {
  const d = new Date();
  const y = d.getFullYear();
  const m = String(d.getMonth() + 1).padStart(2, "0");
  const day = String(d.getDate()).padStart(2, "0");
  return `${y}-${m}-${day}`;
};

/* ===== Estado inicial ===== */
const DEFAULT = {
  codigoProjeto: "PRJ-001",
  nomeProjeto: "",
  dataInicio: todayISO(),
  talhoes: [
    {
      codigo: "T1",
      ativo: true,
      estratos: [
        { codigo: "E1", ativo: true,  dataColeta: todayISO(), areaHa: 7.50 },
        { codigo: "E2", ativo: false, dataColeta: todayISO(), areaHa: 5.00 },
      ],
    },
    {
      codigo: "T2",
      ativo: false,
      estratos: [
        { codigo: "E1", ativo: true,  dataColeta: todayISO(), areaHa: 4.00 },
        { codigo: "E2", ativo: false, dataColeta: todayISO(), areaHa: 4.00 },
      ],
    },
  ],
};

export default function InvProj() {
  const [state, setState] = useState(DEFAULT);
  const [savedAt, setSavedAt] = useState(null);

  /* Storage (auto) */
  useEffect(() => {
    try {
      const raw = localStorage.getItem(LS_KEY);
      if (raw) setState(JSON.parse(raw));
      const ts = localStorage.getItem(`${LS_KEY}:saved_at`);
      if (ts) setSavedAt(new Date(ts));
    } catch {}
  }, []);
  useEffect(() => {
    // auto-save leve (mantém compatibilidade; botão de salvar força timestamp)
    try {
      localStorage.setItem(LS_KEY, JSON.stringify(state));
    } catch {}
  }, [state]);

  /* Área total (não editável) */
  const areaTotal = useMemo(() => {
    return (state.talhoes || []).reduce(
      (acc, t) => acc + (t.estratos || []).reduce((a, e) => a + (parseFloat(e.areaHa) || 0), 0),
      0
    );
  }, [state.talhoes]);

  const idxAtivo = useMemo(() => (state.talhoes || []).findIndex((t) => t.ativo), [state.talhoes]);
  const talhaoAtivo = idxAtivo >= 0 ? state.talhoes[idxAtivo] : null;

  /* ===== Handlers ===== */
  const setField = (path, value) => {
    setState((prev) => {
      const next = { ...prev };
      const keys = path.split(".");
      let ref = next;
      for (let i = 0; i < keys.length - 1; i++) {
        ref[keys[i]] = Array.isArray(ref[keys[i]]) ? [...ref[keys[i]]] : { ...ref[keys[i]] };
        ref = ref[keys[i]];
      }
      ref[keys[keys.length - 1]] = value;
      return next;
    });
  };

  const ativarTalhao = (i) => {
    setState((prev) => {
      const talhoes = prev.talhoes.map((t, idx) => ({ ...t, ativo: idx === i }));
      const t = talhoes[i];
      if (!t.estratos || t.estratos.length === 0) {
        t.estratos = [{ codigo: "E1", ativo: true, dataColeta: todayISO(), areaHa: 0 }];
      } else if (!t.estratos.some((e) => e.ativo)) {
        t.estratos = t.estratos.map((e, idxE) => ({ ...e, ativo: idxE === 0 }));
      }
      return { ...prev, talhoes };
    });
  };

  const editarTalhaoCodigo = (i, codigo) => {
    setState((prev) => {
      const talhoes = prev.talhoes.map((t, idx) => (idx === i ? { ...t, codigo } : t));
      return { ...prev, talhoes };
    });
  };

  const editarEstratoCodigo = (ei, codigo) => {
    if (idxAtivo < 0) return;
    setState((prev) => {
      const talhoes = prev.talhoes.map((t, ti) => {
        if (ti !== idxAtivo) return t;
        const estratos = t.estratos.map((e, i) => (i === ei ? { ...e, codigo } : e));
        return { ...t, estratos };
      });
      return { ...prev, talhoes };
    });
  };

  const toggleEstratoBtn = (ei) => {
    if (idxAtivo < 0) return;
    setState((prev) => {
      const talhoes = prev.talhoes.map((t, ti) => {
        if (ti !== idxAtivo) return t;
        const estratos = t.estratos.map((e, i) => (i === ei ? { ...e, ativo: !e.ativo } : e));
        const ativos = estratos.filter((e) => e.ativo).length;
        if (ativos === 0) estratos[0].ativo = true; // garante >= 1 ativo
        return { ...t, estratos };
      });
      return { ...prev, talhoes };
    });
  };

  const salvarConfiguracao = () => {
    try {
      localStorage.setItem(LS_KEY, JSON.stringify(state));
      const now = new Date();
      localStorage.setItem(`${LS_KEY}:saved_at`, now.toISOString());
      setSavedAt(now);
    } catch (e) {
      // noop: sem backend nesta etapa
    }
  };

  /* ===== UI ===== */
  return (
    <div style={{ ...FONT, display: "grid", gap: 16 }}>
      {/* Cabeçalho do projeto + salvar */}
      <Section
        title="Projeto"
        right={
          <div style={{ display: "flex", alignItems: "center", gap: 10 }}>
            {savedAt ? (
              <div style={{ fontSize: 12, color: "#2f4f2f", fontWeight: 700 }}>
                Salvo às {savedAt.toLocaleTimeString("pt-BR", { hour: "2-digit", minute: "2-digit" })}
              </div>
            ) : null}
            <button style={btnSave} onClick={salvarConfiguracao} title="Salvar configuração">
              Salvar configuração
            </button>
          </div>
        }
      >
        <div style={grid("1fr 2fr 1fr 1fr")}>
          <Field label="Código do Projeto">
            <Input value={state.codigoProjeto} onChange={(v) => setField("codigoProjeto", v)} />
          </Field>
          <Field label="Nome do Projeto">
            <Input value={state.nomeProjeto} onChange={(v) => setField("nomeProjeto", v)} />
          </Field>
          <Field label="Data de início">
            <Input type="date" value={state.dataInicio} onChange={(v) => setField("dataInicio", v)} />
          </Field>
          <Field label="Área Total (ha)">
            <ReadonlyBox>{two(areaTotal)}</ReadonlyBox>
          </Field>
        </div>
      </Section>

      {/* Talhões */}
      <Section title="Talhões">
        <div style={{ display: "grid", gap: 10 }}>
          {(state.talhoes || []).map((t, i) => {
            const active = !!t.ativo;
            const areaTalhao = (t.estratos || []).reduce((a, e) => a + (parseFloat(e.areaHa) || 0), 0);
            return (
              <div
                key={i}
                style={{
                  display: "grid",
                  gridTemplateColumns: "auto 1fr 1fr",
                  gap: 10,
                  alignItems: "center",
                  padding: 12,
                  borderRadius: 12,
                  border: `1px solid ${active ? forestGreen : "#00000022"}`,
                  background: active ? activePastel : white,
                  boxShadow: active ? "0 3px 12px rgba(0,0,0,.08)" : "none",
                }}
              >
                {/* Ativar (exclusivo) */}
                <div>
                  <button
                    onClick={() => ativarTalhao(i)}
                    title="Ativar talhão"
                    style={{
                      ...btn,
                      background: active ? mossGreen : stoneGray,
                      color: active ? white : forestGreen,
                      borderColor: active ? mossGreen : "#d0d5d9",
                    }}
                  >
                    {active ? "Ativo" : "Ativar"}
                  </button>
                </div>

                {/* Código editável */}
                <div>
                  <Label>Código do Talhão</Label>
                  <Input value={t.codigo} onChange={(v) => editarTalhaoCodigo(i, v)} placeholder="T1" />
                </div>

                {/* Área do Talhão (não editável) */}
                <div>
                  <Label>Área do Talhão (ha)</Label>
                  <ReadonlyBox>{two(areaTalhao)}</ReadonlyBox>
                </div>
              </div>
            );
          })}
        </div>
      </Section>

      {/* Estratos do talhão ativo */}
      <Section title="Estratos do Talhão Ativo">
        {talhaoAtivo ? (
          <div style={{ display: "grid", gap: 10 }}>
            {(talhaoAtivo.estratos || []).map((e, ei) => (
              <div
                key={ei}
                style={{
                  display: "grid",
                  gridTemplateColumns: "auto 1fr 1fr 1fr",
                  gap: 10,
                  alignItems: "center",
                  padding: 10,
                  borderRadius: 10,
                  border: "1px solid #0000001a",
                  background: white,
                }}
              >
                {/* Botão Ativado/Desativado (garante >= 1 ativo) */}
                <div>
                  <button
                    onClick={() => toggleEstratoBtn(ei)}
                    style={{
                      ...btn,
                      background: e.ativo ? mossGreen : stoneGray,
                      color: e.ativo ? white : forestGreen,
                      borderColor: e.ativo ? mossGreen : "#d0d5d9",
                      minWidth: 120,
                    }}
                    title={e.ativo ? "Desativar estrato" : "Ativar estrato"}
                  >
                    {e.ativo ? "Ativado" : "Desativado"}
                  </button>
                </div>

                {/* Código do Estrato (editável) */}
                <div>
                  <Label>Código do Estrato</Label>
                  <Input value={e.codigo} onChange={(v) => editarEstratoCodigo(ei, v)} placeholder="E1" />
                </div>

                {/* data de coleta (não editável) */}
                <div>
                  <Label>Data da Coleta</Label>
                  <ReadonlyBox>{e.dataColeta}</ReadonlyBox>
                </div>

                {/* área do estrato (não editável) */}
                <div>
                  <Label>Área do Estrato (ha)</Label>
                  <ReadonlyBox>{two(e.areaHa)}</ReadonlyBox>
                </div>
              </div>
            ))}
          </div>
        ) : (
          <div style={{ color: "#444" }}>Selecione um talhão para exibir os estratos.</div>
        )}
      </Section>
    </div>
  );
}

/* ===== UI helpers ===== */
function Section({ title, children, right }) {
  return (
    <section
      style={{
        background: white,
        borderRadius: 14,
        border: "1px solid #00000014",
        boxShadow: "0 6px 18px rgba(0,0,0,.06)",
        padding: 16,
        fontFamily: "Calibri, Arial, sans-serif",
      }}
    >
      <div style={{ display: "flex", alignItems: "center", justifyContent: "space-between", marginBottom: 10, gap: 10 }}>
        <div style={{ fontWeight: 800, color: forestGreen, fontSize: 18 }}>{title}</div>
        {right || null}
      </div>
      {children}
    </section>
  );
}

function Field({ label, children }) {
  return (
    <div style={{ display: "grid", gap: 6, fontFamily: "Calibri, Arial, sans-serif" }}>
      <Label>{label}</Label>
      {children}
    </div>
  );
}
function Label({ children }) {
  return <div style={{ fontSize: 12, color: "#233", fontWeight: 600, fontFamily: "Calibri, Arial, sans-serif" }}>{children}</div>;
}
function Input({ value, onChange, placeholder, type = "text", step = "any" }) {
  return (
    <input
      value={value}
      onChange={(e) => onChange(e.target.value)}
      placeholder={placeholder}
      type={type}
      step={step}
      style={{
        width: "100%",
        padding: "10px 12px",
        borderRadius: 10,
        border: "1px solid #cfd6dc",
        outline: "none",
        background: "#fdfdfd",
        fontFamily: "Calibri, Arial, sans-serif",
      }}
    />
  );
}
function ReadonlyBox({ children }) {
  return (
    <div
      style={{
        width: "100%",
        padding: "10px 12px",
        borderRadius: 10,
        border: "1px solid #d8dee3",
        background: stoneGray,
        color: "#223",
        fontWeight: 700,
        textAlign: "right",
        fontFamily: "Calibri, Arial, sans-serif",
      }}
    >
      {children}
    </div>
  );
}
const btn = {
  padding: "8px 12px",
  borderRadius: 10,
  border: "1px solid #d0d5d9",
  background: stoneGray,
  color: forestGreen,
  cursor: "pointer",
  fontWeight: 700,
  boxShadow: "0 2px 6px rgba(0,0,0,.08)",
  fontFamily: "Calibri, Arial, sans-serif",
};
const btnSave = {
  ...btn,
  background: mossGreen,
  color: white,
  borderColor: mossGreen,
};

/* ===== Layout util ===== */
function grid(cols) {
  return { display: "grid", gap: 12, gridTemplateColumns: cols, alignItems: "end" };
}
