import { Outlet } from 'react-router-dom';

type Props = {}

function DashboardLayout({}: Props) {
  return (
    <div>DashboardLayout
      <Outlet/>
    </div>
  )
}

export default DashboardLayout;