import { defineConfig, loadEnv } from "vite";
import react from "@vitejs/plugin-react-swc";
import tailwindcss from "@tailwindcss/vite";
import path from "path";

// https://vite.dev/config/
export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), "");
  const devProxyTarget =
    env.VITE_DEV_PROXY_TARGET?.trim() || "http://127.0.0.1:8000";

  return {
    plugins: [react(), tailwindcss()],
    resolve: {
      alias: {
        "@": path.resolve(__dirname, "./src"),
      },
    },
    build: {
      rollupOptions: {
        output: {
          manualChunks(id) {
            if (!id.includes("node_modules")) {
              return;
            }

            const match = id.match(
              /node_modules\/(?:\.pnpm\/[^/]+\/node_modules\/)?(@[^/]+\/[^/]+|[^/]+)/,
            );

            if (!match?.[1]) {
              return "vendor_misc";
            }

            const packageName = match[1].replace("/", "_").replaceAll("-", "_");

            if (
              packageName === "react" ||
              packageName === "react_dom" ||
              packageName === "scheduler"
            ) {
              return "vendor_react";
            }

            if (
              packageName === "react_router" ||
              packageName === "react_router_dom"
            ) {
              return "vendor_router";
            }

            if (packageName.startsWith("@tanstack_")) {
              return "vendor_query";
            }

            if (
              packageName === "leaflet" ||
              packageName === "react_leaflet" ||
              packageName === "@react_leaflet_core"
            ) {
              return "vendor_maps";
            }

            if (
              packageName === "@zxing_browser" ||
              packageName === "@zxing_library" ||
              packageName === "qrcode" ||
              packageName === "dijkstrajs" ||
              packageName === "ts_custom_error"
            ) {
              return "vendor_scanner";
            }

            if (
              packageName.startsWith("@radix_ui_") ||
              packageName === "lucide_react"
            ) {
              return "vendor_ui";
            }

            if (packageName === "axios") {
              return "vendor_http";
            }

            if (
              packageName === "class_variance_authority" ||
              packageName === "clsx" ||
              packageName === "tailwind_merge"
            ) {
              return "vendor_utils";
            }

            return "vendor_misc";
          },
        },
      },
    },
    server: {
      host: true,
      proxy: {
        "/api": {
          target: devProxyTarget,
          changeOrigin: true,
        },
      },
    },
  };
});
