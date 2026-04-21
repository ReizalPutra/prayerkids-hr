import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function EmployeesPage() {
  return <ResourceCrudView config={resourceConfigMap["employees"]} />;
}

export default EmployeesPage;
