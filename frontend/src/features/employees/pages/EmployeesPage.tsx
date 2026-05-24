import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function EmployeesPage() {
  return (
    <ResourceCrudView
      config={resourceConfigMap["employees"]}
      // enableSearch and enableDetailDrawer removed to match current ResourceCrudView signature
    />
  );
}

export default EmployeesPage;
