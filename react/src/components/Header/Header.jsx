import {Link} from "react-router-dom";
import Hamburger from "@/components/Icons/Hamburger.jsx";

function Header() {
  return (
    <>
      <div className="h-[140px]">
        <div className="h-[56px] flex justify-between w-full bg-[#f3f3f3] p-3 border-b border-[#e7eaec]">
          <div className="flex h-full">
            <div className="flex items-center bg-[#1ab394] hover:bg-[#18a689] rounded-md px-1 cursor-pointer mr-3">
              <Hamburger/>
            </div>
            <div className="flex justify-center items-center">
              <div className="mr-2 flex items-center">
                <i className="fa fa-lg fa-cogs"></i>
              </div>
              <span className="font-bold text-2xl">CD-admin</span>
            </div>
          </div>
          <div className="flex items-center justify-end  text-base">
            <div className="cursor-pointer text-gray-400 hover:bg-gray-300 p-1 rounded-md mr-4">
              <i className="fa fa-envelope text-current"></i>
            </div>
            <div className="cursor-pointer text-gray-400 hover:bg-gray-300 p-1 rounded-md mr-4">
              <i className="fa fa-bell text-current"></i>
            </div>
            <div className="cursor-pointer text-gray-400 hover:bg-gray-300 p-1 rounded-md mr-4 font-semibold">
              <i className="fa fa-sign-out text-current"></i>
              <span className="ml-2"></span>Đăng xuất
            </div>
          </div>
        </div>
      </div>
    </>
  )
}

export default Header
