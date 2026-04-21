import ResourceCrudView from "@/features/resources/ResourceCrudView";
import { resourceConfigMap } from "@/features/resources/resource-config";

function PerformanceReviewsPage() {
  return <ResourceCrudView config={resourceConfigMap["performanceReviews"]} />;
}

export default PerformanceReviewsPage;
