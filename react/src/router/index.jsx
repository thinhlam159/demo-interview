import adminRoutes from "./userRoutes.jsx"
import {createBrowserRouter} from "react-router-dom"

const router = createBrowserRouter([
  ...adminRoutes
])

export default router
