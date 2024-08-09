import{j as e,W as f,Y as p,a as n}from"./app-DyA0j1Xd.js";import{G as h}from"./GuestLayout-s9ztFIi2.js";import{T as m,I as d}from"./TextInput-BjNgR7m9.js";import{I as l}from"./InputLabel-Bnf5tpLd.js";import{P as j}from"./PrimaryButton-lpvFp2bI.js";import"./ApplicationLogo-BKEulS55.js";function y({className:r="",...a}){return e.jsx("input",{...a,type:"checkbox",className:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 "+r})}function F({status:r,canResetPassword:a}){const{data:t,setData:o,post:c,processing:u,errors:i,reset:g}=f({email:"",password:"",remember:!1}),x=s=>{s.preventDefault(),c(route("login"),{onFinish:()=>g("password")})};return e.jsxs(h,{children:[e.jsx(p,{title:"Log in"}),r&&e.jsx("div",{className:"mb-4 font-medium text-sm text-green-600",children:r}),e.jsxs("form",{onSubmit:x,children:[e.jsxs("div",{children:[e.jsx(l,{htmlFor:"email",value:"Email"}),e.jsx(m,{id:"email",type:"email",name:"email",value:t.email,className:"mt-1 block w-full",autoComplete:"username",isFocused:!0,onChange:s=>o("email",s.target.value)}),e.jsx(d,{message:i.email,className:"mt-2"})]}),e.jsxs("div",{className:"mt-4",children:[e.jsx(l,{htmlFor:"password",value:"Password"}),e.jsx(m,{id:"password",type:"password",name:"password",value:t.password,className:"mt-1 block w-full",autoComplete:"current-password",onChange:s=>o("password",s.target.value)}),e.jsx(d,{message:i.password,className:"mt-2"})]}),e.jsx("div",{className:"block mt-4",children:e.jsxs("label",{className:"flex items-center",children:[e.jsx(y,{name:"remember",checked:t.remember,onChange:s=>o("remember",s.target.checked)}),e.jsx("span",{className:"ms-2 text-sm text-gray-600 dark:text-gray-400",children:"Remember me"})]})}),e.jsxs("div",{className:"flex items-center justify-between mt-4",children:[e.jsx("div",{children:a&&e.jsx(n,{href:route("password.request"),className:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800",children:"Forgot your password?"})}),e.jsx("div",{children:e.jsx(n,{href:route("register"),className:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800",children:"Not registered?"})}),e.jsx(j,{className:"ms-4",disabled:u,children:"Log in"})]})]})]})}export{F as default};
