import { useMemo, useState } from "react";
import type { FormEvent } from "react";
import { useNavigate } from "react-router-dom";
import { getApiErrorMessage, useLoginMutation } from "@/hooks/useAuth";
import { LoginForm } from "@/components/login-form";

function LoginPage() {
  const navigate = useNavigate();
  const loginMutation = useLoginMutation();

  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");

  const errorMessage = useMemo(
    () =>
      loginMutation.isError ? getApiErrorMessage(loginMutation.error) : "",
    [loginMutation.error, loginMutation.isError],
  );

  const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    try {
      const result = await loginMutation.mutateAsync({ username, password });
      const nextPath =
        result.user.role === "employee" ? "/employees" : "/dashboard";
      navigate(nextPath, { replace: true });
    } catch {
      // Error state is shown through loginMutation and errorMessage.
    }
  };

  return (
    <main className="mx-auto flex min-h-screen w-full max-w-md items-center px-4">
      <LoginForm
        className="w-full"
        username={username}
        password={password}
        onUsernameChange={setUsername}
        onPasswordChange={setPassword}
        onSubmit={handleSubmit}
        isSubmitting={loginMutation.isPending}
        errorMessage={errorMessage}
      />
    </main>
  );
}

export default LoginPage;
