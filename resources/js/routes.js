import Home from "./pages/Home";
// import Products from "./pages/Products";
import Checkout from "./pages/Checkout";
import Register from "./pages/Register";
import OrdersStatus from "./pages/ordersStatus";

import Login from "./pages/Login";
import ZainCash from "./pages/ZainCash";

export default [
    {
        path: "/",
        component: Home
    },
    // {
    //     path: "/products",
    //     component: Products
    // },
    {
        path: "/zain-cash",
        component: ZainCash,
        name: "zain-cash",
        props: route => ({
            zain: route.params.zain,
            order: route.params.order,
            orderId: route.params.orderId,
        }),
    },
    {
        path: "/zain-cash/:order/completed",
        component: ZainCash,
        name: "zain-cash-completed",
        props: route => ({
        }),
    },
    {
        path: "/checkout",
        component: Checkout
    },
    {
        path: "/login",
        component: Login
    },
    {
        path: "/register",
        component: Register
    },
    {
        path: "/orders",
        component: OrdersStatus
    },
]

