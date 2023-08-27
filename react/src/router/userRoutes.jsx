import User from "@/views/User/User";
import Layout from "@/components/Layouts/Layout.jsx";
import ListUser from "@/views/User/ListUser/index.js";
import EditUser from "@/views/User/EditUser/index.js";
import AddUser from "@/views/User/AddUser/index.js";

export default [
  {
    path: "/",
    element: <Layout />,
    children: [
      {
        path: "/user",
        element: <User />,
        children: [
          {
            path: "/user/list",
            element: <ListUser />,
          },
          {
            path: "/user/edit/:id",
            element: <EditUser />,
          },
          {
            path: "/user/add",
            element: <AddUser />,
          },
        ]
      }
    ],
  },
]
