import Header from "@/components/Header/Header.jsx";
import SideBar from "@/components/SideBar/SideBar.jsx";
import {Outlet} from "react-router-dom";

function Layout(props) {
  return (
    <>
      <div className="flex w-full min-h-screen">
        <div className="w-[250px] bg-[#293846]">
          <SideBar />
        </div>
        <div className="w-[86%]">
          <Header />
          <Outlet />
        </div>
      </div>
    </>
  )
}

export default Layout
