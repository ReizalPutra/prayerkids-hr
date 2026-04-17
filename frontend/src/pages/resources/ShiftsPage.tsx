import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function ShiftsPage() {
  return <ResourceCrudView config={resourceConfigMap["shifts"]} />;
}

export default ShiftsPage;
