import { useQuery } from "@tanstack/react-query";
import { divisionService } from "@/services/division";

export const divisionKeys = {
  all: ["divisions"] as const,
};

export const useDivisionsQuery = (enabled = true) => {
  return useQuery({
    queryKey: divisionKeys.all,
    queryFn: divisionService.getAll,
    enabled,
  });
};
