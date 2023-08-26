import {Outlet} from "react-router-dom";
import { getUserDetailApi } from "@/api/user.js"

function User() {

  return (
    <>
      <Outlet />
    </>
  )
}

export default User
