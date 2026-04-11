export type ResourceConfig = {
  key: string;
  title: string;
  description: string;
  endpoint: string;
  columns: Array<{ key: string; label: string }>;
  fields: ResourceField[];
  samplePayload: Record<string, unknown>;
};

export type ResourceFieldType =
  | "text"
  | "number"
  | "date"
  | "time"
  | "datetime"
  | "textarea"
  | "select"
  | "checkbox";

export type ResourceFieldOption = {
  label: string;
  value: string | number | boolean;
};

export type ResourceField = {
  key: string;
  label: string;
  type: ResourceFieldType;
  required?: boolean;
  placeholder?: string;
  options?: ResourceFieldOption[];
  optionsFrom?: {
    endpoint: string;
    labelKey: string;
    valueKey?: string;
  };
};

export const resourceConfigs: ResourceConfig[] = [
  {
    key: "divisions",
    title: "Divisions",
    description: "Kelola data divisi organisasi.",
    endpoint: "/divisions",
    columns: [
      { key: "name", label: "Name" },
      { key: "description", label: "Description" },
    ],
    fields: [
      {
        key: "name",
        label: "Name",
        type: "text",
        required: true,
        placeholder: "People Operations",
      },
      {
        key: "description",
        label: "Description",
        type: "textarea",
        placeholder: "Mengelola SDM",
      },
    ],
    samplePayload: { name: "People Operations", description: "Mengelola SDM" },
  },
  {
    key: "positions",
    title: "Positions",
    description: "Kelola data jabatan.",
    endpoint: "/positions",
    columns: [
      { key: "title", label: "Title" },
      { key: "base_salary", label: "Base Salary" },
    ],
    fields: [
      {
        key: "title",
        label: "Title",
        type: "text",
        required: true,
        placeholder: "HR Officer",
      },
      {
        key: "division_id",
        label: "Division",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/divisions", labelKey: "name" },
      },
      {
        key: "base_salary",
        label: "Base Salary",
        type: "number",
        required: true,
        placeholder: "5500000",
      },
    ],
    samplePayload: {
      title: "HR Officer",
      division_id: "<division_uuid>",
      base_salary: 5500000,
    },
  },
  {
    key: "shifts",
    title: "Shifts",
    description: "Kelola data shift kerja.",
    endpoint: "/shifts",
    columns: [
      { key: "name", label: "Name" },
      { key: "start_time", label: "Start" },
      { key: "end_time", label: "End" },
    ],
    fields: [
      {
        key: "name",
        label: "Name",
        type: "text",
        required: true,
        placeholder: "Pagi",
      },
      { key: "start_time", label: "Start Time", type: "time", required: true },
      { key: "end_time", label: "End Time", type: "time", required: true },
    ],
    samplePayload: {
      name: "Pagi",
      start_time: "08:00:00",
      end_time: "17:00:00",
    },
  },
  {
    key: "attendanceLocations",
    title: "Attendance Locations",
    description: "Kelola lokasi absensi.",
    endpoint: "/attendanceLocations",
    columns: [
      { key: "name", label: "Name" },
      { key: "latitude", label: "Latitude" },
      { key: "longitude", label: "Longitude" },
    ],
    fields: [
      {
        key: "name",
        label: "Name",
        type: "text",
        required: true,
        placeholder: "Kantor Pusat",
      },
      {
        key: "latitude",
        label: "Latitude",
        type: "number",
        required: true,
        placeholder: "-6.2009",
      },
      {
        key: "longitude",
        label: "Longitude",
        type: "number",
        required: true,
        placeholder: "106.8166",
      },
      {
        key: "radius_meter",
        label: "Radius (meter)",
        type: "number",
        required: true,
        placeholder: "100",
      },
    ],
    samplePayload: {
      name: "Kantor Pusat",
      latitude: -6.2009,
      longitude: 106.8166,
      radius_meter: 100,
    },
  },
  {
    key: "contractTemplates",
    title: "Contract Templates",
    description: "Kelola template kontrak kerja.",
    endpoint: "/contractTemplates",
    columns: [
      { key: "name", label: "Name" },
      { key: "is_active", label: "Active" },
    ],
    fields: [
      {
        key: "name",
        label: "Name",
        type: "text",
        required: true,
        placeholder: "PKWT Standard",
      },
      {
        key: "body",
        label: "Body",
        type: "textarea",
        required: true,
        placeholder: "Isi kontrak...",
      },
      { key: "is_active", label: "Is Active", type: "checkbox" },
    ],
    samplePayload: {
      name: "PKWT Standard",
      body: "Isi kontrak...",
      is_active: true,
    },
  },
  {
    key: "employees",
    title: "Employees",
    description: "Kelola data karyawan.",
    endpoint: "/employees",
    columns: [
      { key: "nik", label: "NIK" },
      { key: "full_name", label: "Full Name" },
      { key: "status", label: "Status" },
    ],
    fields: [
      {
        key: "nik",
        label: "NIK",
        type: "text",
        required: true,
        placeholder: "EMP-2026-001",
      },
      {
        key: "full_name",
        label: "Full Name",
        type: "text",
        required: true,
        placeholder: "Budi Setiawan",
      },
      {
        key: "division_id",
        label: "Division",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/divisions", labelKey: "name" },
      },
      {
        key: "position_id",
        label: "Position",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/positions", labelKey: "title" },
      },
      { key: "join_date", label: "Join Date", type: "date", required: true },
      {
        key: "status",
        label: "Status",
        type: "select",
        required: true,
        options: [
          { label: "Active", value: "active" },
          { label: "Inactive", value: "inactive" },
          { label: "Resigned", value: "resigned" },
        ],
      },
    ],
    samplePayload: {
      nik: "EMP-2026-001",
      full_name: "Budi Setiawan",
      division_id: "<division_uuid>",
      position_id: "<position_uuid>",
      join_date: "2026-01-01",
      status: "active",
    },
  },
  {
    key: "attendances",
    title: "Attendances",
    description: "Kelola data kehadiran.",
    endpoint: "/attendances",
    columns: [
      { key: "date", label: "Date" },
      { key: "status", label: "Status" },
      { key: "employee_id", label: "Employee" },
    ],
    fields: [
      {
        key: "employee_id",
        label: "Employee",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/employees", labelKey: "full_name" },
      },
      {
        key: "shift_id",
        label: "Shift",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/shifts", labelKey: "name" },
      },
      {
        key: "location_id",
        label: "Attendance Location",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/attendanceLocations", labelKey: "name" },
      },
      { key: "date", label: "Date", type: "date", required: true },
      {
        key: "status",
        label: "Status",
        type: "select",
        required: true,
        options: [
          { label: "On Time", value: "on_time" },
          { label: "Late", value: "late" },
          { label: "Absent", value: "absent" },
        ],
      },
    ],
    samplePayload: {
      employee_id: "<employee_uuid>",
      shift_id: "<shift_uuid>",
      location_id: "<attendance_location_uuid>",
      date: "2026-04-11",
      status: "on_time",
    },
  },
  {
    key: "leaveRequests",
    title: "Leave Requests",
    description: "Kelola pengajuan cuti.",
    endpoint: "/leaveRequests",
    columns: [
      { key: "type", label: "Type" },
      { key: "status", label: "Status" },
      { key: "employee_id", label: "Employee" },
    ],
    fields: [
      {
        key: "employee_id",
        label: "Employee",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/employees", labelKey: "full_name" },
      },
      {
        key: "type",
        label: "Type",
        type: "select",
        required: true,
        options: [
          { label: "Annual", value: "annual" },
          { label: "Sick", value: "sick" },
          { label: "Special", value: "special" },
          { label: "Unpaid", value: "unpaid" },
        ],
      },
      { key: "start_date", label: "Start Date", type: "date", required: true },
      { key: "end_date", label: "End Date", type: "date", required: true },
      {
        key: "reason",
        label: "Reason",
        type: "textarea",
        required: true,
        placeholder: "Keperluan keluarga",
      },
      {
        key: "status",
        label: "Status",
        type: "select",
        required: true,
        options: [
          { label: "Pending", value: "pending" },
          { label: "Approved", value: "approved" },
          { label: "Rejected", value: "rejected" },
        ],
      },
    ],
    samplePayload: {
      employee_id: "<employee_uuid>",
      type: "annual",
      start_date: "2026-05-10",
      end_date: "2026-05-12",
      reason: "Keperluan keluarga",
      status: "pending",
    },
  },
  {
    key: "payrolls",
    title: "Payrolls",
    description: "Kelola penggajian.",
    endpoint: "/payrolls",
    columns: [
      { key: "month", label: "Month" },
      { key: "year", label: "Year" },
      { key: "net_salary", label: "Net Salary" },
    ],
    fields: [
      {
        key: "employee_id",
        label: "Employee",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/employees", labelKey: "full_name" },
      },
      {
        key: "month",
        label: "Month",
        type: "text",
        required: true,
        placeholder: "April",
      },
      {
        key: "year",
        label: "Year",
        type: "number",
        required: true,
        placeholder: "2026",
      },
      {
        key: "basic_salary_snapshot",
        label: "Basic Salary Snapshot",
        type: "number",
        required: true,
        placeholder: "6000000",
      },
      {
        key: "net_salary",
        label: "Net Salary",
        type: "number",
        required: true,
        placeholder: "6600000",
      },
      {
        key: "payment_status",
        label: "Payment Status",
        type: "select",
        required: true,
        options: [
          { label: "Pending", value: "pending" },
          { label: "Paid", value: "paid" },
          { label: "Failed", value: "failed" },
        ],
      },
    ],
    samplePayload: {
      employee_id: "<employee_uuid>",
      month: "April",
      year: 2026,
      basic_salary_snapshot: 6000000,
      net_salary: 6600000,
      payment_status: "pending",
    },
  },
  {
    key: "performanceReviews",
    title: "Performance Reviews",
    description: "Kelola review performa karyawan.",
    endpoint: "/performanceReviews",
    columns: [
      { key: "review_period", label: "Period" },
      { key: "final_score", label: "Final Score" },
      { key: "employee_id", label: "Employee" },
    ],
    fields: [
      {
        key: "employee_id",
        label: "Employee",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/employees", labelKey: "full_name" },
      },
      {
        key: "reviewer_id",
        label: "Reviewer",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/employees", labelKey: "full_name" },
      },
      {
        key: "review_period",
        label: "Review Period",
        type: "text",
        required: true,
        placeholder: "Q1-2026",
      },
      {
        key: "final_score",
        label: "Final Score",
        type: "number",
        required: true,
        placeholder: "89",
      },
      { key: "is_locked", label: "Is Locked", type: "checkbox" },
    ],
    samplePayload: {
      employee_id: "<employee_uuid>",
      reviewer_id: "<employee_uuid>",
      review_period: "Q1-2026",
      final_score: 89,
      is_locked: false,
    },
  },
  {
    key: "jobVacancies",
    title: "Job Vacancies",
    description: "Kelola lowongan pekerjaan.",
    endpoint: "/jobVacancies",
    columns: [
      { key: "title", label: "Title" },
      { key: "status", label: "Status" },
      { key: "expired_date", label: "Expired" },
    ],
    fields: [
      {
        key: "position_id",
        label: "Position",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/positions", labelKey: "title" },
      },
      {
        key: "title",
        label: "Title",
        type: "text",
        required: true,
        placeholder: "Backend Developer",
      },
      {
        key: "description",
        label: "Description",
        type: "textarea",
        required: true,
        placeholder: "Mengembangkan API HRIS.",
      },
      {
        key: "requirements",
        label: "Requirements",
        type: "textarea",
        required: true,
        placeholder: "Laravel, MySQL",
      },
      {
        key: "status",
        label: "Status",
        type: "select",
        required: true,
        options: [
          { label: "Open", value: "open" },
          { label: "Closed", value: "closed" },
          { label: "Draft", value: "draft" },
        ],
      },
      {
        key: "expired_date",
        label: "Expired Date",
        type: "date",
        required: true,
      },
    ],
    samplePayload: {
      position_id: "<position_uuid>",
      title: "Backend Developer",
      description: "Mengembangkan API HRIS.",
      requirements: "Laravel, MySQL",
      status: "open",
      expired_date: "2026-06-30",
    },
  },
  {
    key: "applicants",
    title: "Applicants",
    description: "Kelola data pelamar.",
    endpoint: "/applicants",
    columns: [
      { key: "name", label: "Name" },
      { key: "email", label: "Email" },
      { key: "stage", label: "Stage" },
    ],
    fields: [
      {
        key: "job_vacancy_id",
        label: "Job Vacancy",
        type: "select",
        required: true,
        optionsFrom: { endpoint: "/jobVacancies", labelKey: "title" },
      },
      {
        key: "name",
        label: "Name",
        type: "text",
        required: true,
        placeholder: "Siti Aminah",
      },
      {
        key: "email",
        label: "Email",
        type: "text",
        required: true,
        placeholder: "siti.aminah@example.com",
      },
      {
        key: "phone",
        label: "Phone",
        type: "text",
        required: true,
        placeholder: "081234567899",
      },
      {
        key: "resume_path",
        label: "Resume Path",
        type: "text",
        required: true,
        placeholder: "resumes/siti-aminah.pdf",
      },
      {
        key: "stage",
        label: "Stage",
        type: "select",
        required: true,
        options: [
          { label: "Screening", value: "screening" },
          { label: "Interview", value: "interview" },
          { label: "Offer", value: "offer" },
          { label: "Rejected", value: "rejected" },
        ],
      },
    ],
    samplePayload: {
      job_vacancy_id: "<job_vacancy_uuid>",
      name: "Siti Aminah",
      email: "siti.aminah@example.com",
      phone: "081234567899",
      resume_path: "resumes/siti-aminah.pdf",
      stage: "screening",
    },
  },
];

export const resourceConfigMap = Object.fromEntries(
  resourceConfigs.map((config) => [config.key, config]),
) as Record<string, ResourceConfig>;
