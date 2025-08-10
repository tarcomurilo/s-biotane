import React, { useMemo, useEffect } from "react";
import { useLocation, useNavigate } from "react-router-dom";
import { resolveTopbarConfig } from "../config/topbarConfig"; // << minúsculo

const forestGreen = "#2e4631";
const mossGreen   = "#6b8e23";
const stoneGray   = "#e5e5e5";
const white       = "#fff";

const topbarStyle = {
  fontFamily: "Calibri, Arial, sans-serif",
  background: forestGreen,
  color: white,
  display: "grid",
  gridTemplateColumns: "1fr auto",
  alignItems: "start",
  columnGap: 12,
  rowGap: 10,
  padding: "10px 16px",
  width: "100%",
  boxShadow: "0 2px 14px #2e46311a",
  borderBottom: "1px solid #00000018",
  borderRadius: "0 0 16px 16px",
};
const trackStyle = { display: "flex", flexWrap: "wrap", gap: 10, alignItems: "center", minWidth: 0 };
const rightWrapStyle = { display: "flex", flexWrap: "wrap", gap: 10, alignItems: "center", justifyContent: "flex-end" };
const navBtnStyle = {
  background: stoneGray, color: forestGreen, border: "none", borderRadius: 7,
  fontWeight: 700, fontSize: 15, letterSpacing: .5, cursor: "pointer",
  padding: "7px 16px", boxShadow: "0 2px 7px #2e463115", transition: "all .15s", whiteSpace: "nowrap",
};
function NavButton({ active, children, ...props }) {
  return (
    <button
      style={{ ...navBtnStyle, ...(active ? { background: mossGreen, color: white, boxShadow: "0 3px 9px #6b8e2318" } : {}) }}
      {...props}
    >{children}</button>
  );
}

export default function Topbar({ onAction }) {
  const location = useLocation();
  const navigate = useNavigate();

  const conf = useMemo(() => resolveTopbarConfig(location.pathname), [location.pathname]);
  if (!conf) return null;

  const qs = new URLSearchParams(location.search);
  const activeTab = qs.get("tab");

  // Se tem abas e não há ?tab=, seta a primeira automaticamente
  useEffect(() => {
    const tabs = (conf.items || []).filter(i => i.type === "tab");
    if (!tabs.length) return;
    if (activeTab) return;
    const u = new URLSearchParams(location.search);
    u.set("tab", tabs[0].value);
    navigate({ pathname: location.pathname, search: `?${u.toString()}` }, { replace: true });
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [conf, location.pathname]);

  const raise = (action, payload) => {
    if (typeof onAction === "function") onAction(action, payload);
    else alert(`${action}${payload ? `: ${JSON.stringify(payload)}` : ""}`);
  };

  const onClickItem = (it) => {
    if (it.type === "tab") {
      const u = new URLSearchParams(location.search);
      u.set("tab", it.value);
      navigate({ pathname: location.pathname, search: `?${u.toString()}` }, { replace: true });
      return;
    }
    if (it.type === "route") { navigate(it.path || "/"); return; }
    if (it.type === "action") { raise(it.action, { path: conf.basePath || location.pathname, at: Date.now() }); return; }
  };

  const isActive = (it) => it.type === "tab" && activeTab === it.value;

  return (
    <header style={topbarStyle}>
      <nav style={trackStyle}>
        {conf.items.map((it) => (
          <NavButton
            key={it.label + (it.value || it.action || it.path || "")}
            active={isActive(it)}
            onClick={() => onClickItem(it)}
            aria-pressed={isActive(it)}
            title={it.label}
          >
            {it.label}
          </NavButton>
        ))}
      </nav>
      <div style={rightWrapStyle}>
        {(conf.rightActions || []).map((ra) => (
          <button
            key={ra.label + (ra.action || "")}
            style={navBtnStyle}
            onClick={() => onClickItem(ra)}
            title={ra.label}
          >
            {ra.label}
          </button>
        ))}
      </div>
    </header>
  );
}
