import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import "./index.css";
import { BrowserRouter } from "react-router-dom";
import { ReactQueryProvider } from "./app/Providers/ReactQueryProvider.tsx";
import AppRouter from "./router/index.tsx";



createRoot(document.getElementById("root")!).render(
  <StrictMode>
    <ReactQueryProvider>
      <BrowserRouter>
        <AppRouter />
      </BrowserRouter>
    </ReactQueryProvider>
    
  </StrictMode>,
);
