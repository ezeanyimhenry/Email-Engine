import{r as x,j as e}from"./app-DyA0j1Xd.js";import{u}from"./index-ByCN3yWv.js";import{u as p,D as g,a as w}from"./DashboardLayout-BsZGXRb9.js";import"./index-C9hbQmAN.js";import"./ApplicationLogo-BKEulS55.js";import"./Modal-ClcRjVxP.js";import"./transition-Cp7My-e_.js";function _({auth:n={user:"collins",email:"collinschristroa@gmail.com"}}){const{data:r,setData:o,post:d,processing:i,errors:t}=u({name:n.user.name||"",email:n.user.email||"",current_password:"",new_password:"",new_password_confirmation:""}),[a,m]=x.useState(!1),l=s=>{s.preventDefault(),d("/settings/update",{onSuccess:()=>{}})},c=p({opacity:a?1:0,transform:a?"translateY(0)":"translateY(-20px)"});return e.jsx(g,{children:e.jsxs("div",{className:"max-w-3xl px-4 py-6 mx-auto",children:[e.jsx("h1",{className:"text-2xl font-semibold text-gray-800",children:"Account Settings"}),e.jsxs("form",{onSubmit:l,className:"mt-6 space-y-6",children:[e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"Name"}),e.jsx("input",{type:"text",value:r.name,onChange:s=>o("name",s.target.value),className:"block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.name&&e.jsx("p",{className:"text-sm text-red-600",children:t.name})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"Email"}),e.jsx("input",{type:"email",value:r.email,onChange:s=>o("email",s.target.value),className:"block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.email&&e.jsx("p",{className:"text-sm text-red-600",children:t.email})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"Current Password"}),e.jsx("input",{type:a?"text":"password",value:r.current_password,onChange:s=>o("current_password",s.target.value),className:"block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.current_password&&e.jsx("p",{className:"text-sm text-red-600",children:t.current_password})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"New Password"}),e.jsx("input",{type:a?"text":"password",value:r.new_password,onChange:s=>o("new_password",s.target.value),className:"block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.new_password&&e.jsx("p",{className:"text-sm text-red-600",children:t.new_password})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"Confirm New Password"}),e.jsx("input",{type:a?"text":"password",value:r.new_password_confirmation,onChange:s=>o("new_password_confirmation",s.target.value),className:"block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.new_password_confirmation&&e.jsx("p",{className:"text-sm text-red-600",children:t.new_password_confirmation})]}),e.jsx(w.div,{style:c,children:e.jsxs("div",{className:"flex items-center",children:[e.jsx("input",{type:"checkbox",checked:a,onChange:()=>m(!a),className:"w-4 h-4 text-indigo-600 border-gray-300 rounded"}),e.jsx("label",{className:"ml-2 text-sm text-gray-600",children:"Show Password"})]})}),e.jsx("div",{children:e.jsx("button",{type:"submit",className:"inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",disabled:i,children:i?"Saving...":"Save Changes"})})]})]})})}export{_ as default};
