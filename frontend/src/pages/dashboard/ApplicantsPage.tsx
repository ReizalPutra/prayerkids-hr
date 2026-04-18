import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function ApplicantsPage() {
  return <ResourceCrudView config={resourceConfigMap["applicants"]} />;
}

export default ApplicantsPage;
