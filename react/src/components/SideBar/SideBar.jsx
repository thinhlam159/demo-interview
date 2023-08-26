import {Link} from "react-router-dom";

function SideBar() {
  return (
    <>
      <div className="">
        <div className="h-[140px] p-8">
          <div className="w-[50px] h-[50px] rounded-full overflow-hidden mb-2">
            {/*<img :src="AvatarDefault" alt="none">*/}
          </div>
          <span className="font-bold text-base text-gray-200 text-[#a7b1c2]"></span>
        </div>
        <ul className="">
          <Link to={'./user'}
                className="py-4 px-2 flex items-center hover:text-white text-[#a7b1c2] hover:bg-[#293846] bg-[#2f4050] rounded"
          >
          <div className="mx-2 flex items-center text-current">
            <i className="font-medium text-current"></i>
          </div>
          <span className="text-sm font-medium text-current">Quản lý user</span>
          </Link>
        </ul>
      </div>
    </>
  )
}

export default SideBar
