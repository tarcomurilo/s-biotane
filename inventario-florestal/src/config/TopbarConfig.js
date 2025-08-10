// src/config/topbarConfig.js
export const TOPBAR_CONFIG = [
  
   {
    basePath: "/projetos",
    theme: "dark",
    items: [
      { label: "Projetos",        type: "tab",   value: "invproj" },
      { label: "Novo projeto",     type: "tab",   value: "invamostragem" },

    ],
    rightActions: [
      { label: "Editar", type: "action", action: "inv_export" },
    ],
  },

    {
    basePath: "/orcamento",
    theme: "dark",
    items: [
      { label: "Projeto",        type: "tab",   value: "invproj" },
      { label: "Logística",     type: "tab",   value: "invamostragem" },
      { label: "Material",     type: "tab",   value: "invvolumetria" },
      { label: "Pessoal",type: "tab",   value: "invfitossociologia" },
      { label: "Escritório",      type: "tab",   value: "investrutura" },
    ],
    rightActions: [
      { label: "Exportar", type: "action", action: "inv_export" },
    ],
  },
  
  {
    basePath: "/inventario",
    theme: "dark",
    items: [
      { label: "Projeto",        type: "tab",   value: "invproj" },
      { label: "Amostragem",     type: "tab",   value: "invamostragem" },
      { label: "Volumetria",     type: "tab",   value: "invvolumetria" },
      { label: "Fitossociologia",type: "tab",   value: "invfitossociologia" },
      { label: "Estrutura",      type: "tab",   value: "investrutura" },
      { label: "Distribuição",   type: "tab",   value: "invdistribuicao" },
      { label: "Ecologia",       type: "tab",   value: "invecologia" },
    ],
    rightActions: [
      { label: "Layout",   type: "action", action: "inv_layout" },
      { label: "Exportar", type: "action", action: "inv_export" },
    ],
  },

  {
    basePath: "/mapa",
    theme: "dark",
    items: [
      { label: "Mapa",        type: "tab",   value: "invproj" },
      { label: "Layout",     type: "tab",   value: "invamostragem" },
      { label: "Exportar",     type: "tab",   value: "invvolumetria" },

    ],
    rightActions: [

    ],
  },
  
  {
    basePath: "/dados",
    theme: "dark",
    items: [
      { label: "Projetos",        type: "tab",   value: "invproj" },
      { label: "Novo projeto",     type: "tab",   value: "invamostragem" },

    ],
    rightActions: [
      { label: "Editar", type: "action", action: "inv_export" },
    ],
  },

  {
    basePath: "/config",
    theme: "dark",
    items: [
      { label: "Projetos",        type: "tab",   value: "invproj" },
      { label: "Novo projeto",     type: "tab",   value: "invamostragem" },

    ],
    rightActions: [
      { label: "Editar", type: "action", action: "inv_export" },
    ],
  },

  {
    basePath: "/perfil",
    theme: "dark",
    items: [
      { label: "Perfil",        type: "tab",   value: "invproj" },
      { label: "Segurança",     type: "tab",   value: "invamostragem" },
      { label: "Planos",     type: "tab",   value: "invamostragem2" },
      { label: "Pagamento",     type: "tab",   value: "invamostragem3" },
    ],
    rightActions: [
      { label: "Exclusão de Perfil", type: "action", action: "inv_export" },
    ],
  },
  // adicione outros grupos (ex.: /mapa, /projetos, etc.)
];

export function resolveTopbarConfig(pathname) {
  let best = null;
  for (const c of TOPBAR_CONFIG) {
    if (pathname.startsWith(c.basePath)) {
      if (!best || c.basePath.length > best.basePath.length) best = c;
    }
  }
  return best;
}
