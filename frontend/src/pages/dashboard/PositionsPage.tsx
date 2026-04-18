import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function PositionsPage() {
  return <ResourceCrudView config={resourceConfigMap["positions"]} />;
}

export default PositionsPage;
