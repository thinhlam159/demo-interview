import User from "@/views/User/User";
import Layout from "@/components/Layouts/Layout.jsx";

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
            path: "/user",
            element: <User />,
          },
          {
            path: "/user",
            element: <User />,
          },
          {
            path: "/user",
            element: <User />,
          },
        ]
      }
    ],
  },
]
