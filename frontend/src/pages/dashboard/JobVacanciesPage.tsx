import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function JobVacanciesPage() {
  return <ResourceCrudView config={resourceConfigMap["jobVacancies"]} />;
}

export default JobVacanciesPage;
