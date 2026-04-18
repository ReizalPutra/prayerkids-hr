import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function PayrollsPage() {
  return <ResourceCrudView config={resourceConfigMap["payrolls"]} />;
}

export default PayrollsPage;
