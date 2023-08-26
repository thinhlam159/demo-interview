import './App.css'
import { RouterProvider } from "react-router-dom";
import router from "@/router/index.jsx";
import Layout from "@/components/Layouts/Layout.jsx";

function App() {

  return (
    <>
      <Layout>
        {/*<RouterProvider router={router} />*/}
      </Layout>
    </>
  )
}

export default App
