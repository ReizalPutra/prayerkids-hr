import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function DivisionsPage() {
  return <ResourceCrudView config={resourceConfigMap["divisions"]} />;
}

export default DivisionsPage;
