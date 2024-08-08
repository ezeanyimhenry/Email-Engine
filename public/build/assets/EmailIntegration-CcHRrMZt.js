import{j as e}from"./app-CgsGaafV.js";import{u as n}from"./index-zSWoJFbO.js";import{u as l,D as c,a as p}from"./DashboardLayout-Dn06Sy3g.js";function b({auth:u}){const{data:r,setData:a,post:i,processing:o,errors:t}=n({smtp_server:"",smtp_port:"",smtp_user:"",smtp_password:"",api_key:"",api_secret:""}),m=s=>{s.preventDefault(),i("/settings/email-integration",{onSuccess:()=>{}})},d=l({opacity:1,transform:"translateY(0)"});return e.jsx(c,{children:e.jsxs("div",{className:"max-w-3xl mx-auto px-4 py-6",children:[e.jsx("h1",{className:"text-2xl font-semibold text-gray-800",children:"Email Integration Setup"}),e.jsxs("form",{onSubmit:m,className:"mt-6 space-y-6",children:[e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"SMTP Server"}),e.jsx("input",{type:"text",value:r.smtp_server,onChange:s=>a("smtp_server",s.target.value),className:"mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.smtp_server&&e.jsx("p",{className:"text-red-600 text-sm",children:t.smtp_server})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"SMTP Port"}),e.jsx("input",{type:"number",value:r.smtp_port,onChange:s=>a("smtp_port",s.target.value),className:"mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.smtp_port&&e.jsx("p",{className:"text-red-600 text-sm",children:t.smtp_port})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"SMTP User"}),e.jsx("input",{type:"text",value:r.smtp_user,onChange:s=>a("smtp_user",s.target.value),className:"mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.smtp_user&&e.jsx("p",{className:"text-red-600 text-sm",children:t.smtp_user})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"SMTP Password"}),e.jsx("input",{type:"password",value:r.smtp_password,onChange:s=>a("smtp_password",s.target.value),className:"mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.smtp_password&&e.jsx("p",{className:"text-red-600 text-sm",children:t.smtp_password})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"API Key"}),e.jsx("input",{type:"text",value:r.api_key,onChange:s=>a("api_key",s.target.value),className:"mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.api_key&&e.jsx("p",{className:"text-red-600 text-sm",children:t.api_key})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700",children:"API Secret"}),e.jsx("input",{type:"text",value:r.api_secret,onChange:s=>a("api_secret",s.target.value),className:"mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"}),t.api_secret&&e.jsx("p",{className:"text-red-600 text-sm",children:t.api_secret})]}),e.jsx(p.div,{style:d,children:e.jsx("div",{children:e.jsx("button",{type:"submit",className:"inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",disabled:o,children:o?"Saving...":"Save Settings"})})})]})]})})}export{b as default};
