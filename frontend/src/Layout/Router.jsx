import {
    createBrowserRouter,
} from "react-router-dom";
import ErrorPage from "../Pages/ErrorPage/ErrorPage";
import Root from "./Root";
import Home from "../Pages/AllUser/HomePage/Home";
import Register from "../Pages/AllUser/Register/Register";
import Login from "../Pages/AllUser/Login/Login";

const Router = createBrowserRouter([
    {
        path: "/",
        element: <Root/>,  // Main layout component
        errorElement: <ErrorPage/>,
        children: [
            {
                path: "/",
                element: <Home />,
            },
            {
                path: "/register",
                element: <Register />,
            },
            {
                path: "/login",
                element: <Login/>,
            }
        ],
    },
]);

export default Router;
