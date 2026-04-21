import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function AttendancesPage() {
  return <ResourceCrudView config={resourceConfigMap["attendances"]} />;
}

export default AttendancesPage;
