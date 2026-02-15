import { Outlet } from 'react-router-dom';

type Props = {}

function DahsboardLayout({}: Props) {
  return (
    <div>
      <Outlet />
    </div>
  )
}

export default DahsboardLayout