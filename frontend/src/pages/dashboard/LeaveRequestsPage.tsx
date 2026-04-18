import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function LeaveRequestsPage() {
  return <ResourceCrudView config={resourceConfigMap["leaveRequests"]} />;
}

export default LeaveRequestsPage;
