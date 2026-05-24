import globals from "globals";
import tsParser from "@typescript-eslint/parser";
import tsPlugin from "@typescript-eslint/eslint-plugin";
import reactHooks from "eslint-plugin-react-hooks";
import { defineConfig, globalIgnores } from "eslint/config";

const tsRules =
  tsPlugin &&
  tsPlugin.configs &&
  tsPlugin.configs.recommended &&
  tsPlugin.configs.recommended.rules
    ? tsPlugin.configs.recommended.rules
    : {};
const reactHookRules =
  reactHooks &&
  reactHooks.configs &&
  reactHooks.configs.recommended &&
  reactHooks.configs.recommended.rules
    ? reactHooks.configs.recommended.rules
    : {};

export default defineConfig([
  globalIgnores(["dist"]),
  {
    files: ["**/*.{ts,tsx}"],
    languageOptions: {
      parser: tsParser,
      parserOptions: {
        project: ["./tsconfig.node.json", "./tsconfig.app.json"],
        tsconfigRootDir: import.meta.dirname,
        ecmaVersion: 2020,
        sourceType: "module",
      },
      globals: globals.browser,
    },
    plugins: {
      "@typescript-eslint": tsPlugin,
      "react-hooks": reactHooks,
    },
    rules: {
      ...tsRules,
      ...reactHookRules,
    },
  },
]);
