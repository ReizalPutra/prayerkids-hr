import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function ContractTemplatesPage() {
  return <ResourceCrudView config={resourceConfigMap["contractTemplates"]} />;
}

export default ContractTemplatesPage;
