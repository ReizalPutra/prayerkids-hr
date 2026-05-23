import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";

function UserManagementPage() {
  return (
    <section className="space-y-4">
      <Card>
        <CardHeader>
          <CardTitle>User Management</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-sm text-muted-foreground">
            Halaman ini khusus Super Admin untuk kelola users dan roles.
          </p>
        </CardContent>
      </Card>
    </section>
  );
}

export default UserManagementPage;
