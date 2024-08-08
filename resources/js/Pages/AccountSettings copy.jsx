import React, { useState } from "react";
import { useForm } from "@inertiajs/inertia-react";
import { useSpring, animated } from "react-spring";
import DashboardLayout from "../Layouts/DashboardLayout";

export default function AccountSettings({ auth = {user: 'collins', email: 'collinschristroa@gmail.com'} }) {
    const { data, setData, post, processing, errors } = useForm({
        name: auth.user.name || "",
        email: auth.user.email || "",
        current_password: "",
        new_password: "",
        new_password_confirmation: "",
    });

    const [showPassword, setShowPassword] = useState(false);

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/settings/update", {
            onSuccess: () => {
                // Handle successful form submission (e.g., show a success message)
            },
        });
    };

    const passwordSpring = useSpring({
        opacity: showPassword ? 1 : 0,
        transform: showPassword ? "translateY(0)" : "translateY(-20px)",
    });

    return (
        <DashboardLayout>
        <div className="max-w-3xl px-4 py-6 mx-auto">
            <h1 className="text-2xl font-semibold text-gray-800">Account Settings</h1>
            <form onSubmit={handleSubmit} className="mt-6 space-y-6">
                <div>
                    <label className="block text-sm font-medium text-gray-700">Name</label>
                    <input
                        type="text"
                        value={data.name}
                        onChange={(e) => setData("name", e.target.value)}
                        className="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    />
                    {errors.name && <p className="text-sm text-red-600">{errors.name}</p>}
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        value={data.email}
                        onChange={(e) => setData("email", e.target.value)}
                        className="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    />
                    {errors.email && <p className="text-sm text-red-600">{errors.email}</p>}
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Current Password</label>
                    <input
                        type={showPassword ? "text" : "password"}
                        value={data.current_password}
                        onChange={(e) => setData("current_password", e.target.value)}
                        className="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    />
                    {errors.current_password && <p className="text-sm text-red-600">{errors.current_password}</p>}
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">New Password</label>
                    <input
                        type={showPassword ? "text" : "password"}
                        value={data.new_password}
                        onChange={(e) => setData("new_password", e.target.value)}
                        className="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    />
                    {errors.new_password && <p className="text-sm text-red-600">{errors.new_password}</p>}
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input
                        type={showPassword ? "text" : "password"}
                        value={data.new_password_confirmation}
                        onChange={(e) => setData("new_password_confirmation", e.target.value)}
                        className="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    />
                    {errors.new_password_confirmation && <p className="text-sm text-red-600">{errors.new_password_confirmation}</p>}
                </div>

                <animated.div style={passwordSpring}>
                    <div className="flex items-center">
                        <input
                            type="checkbox"
                            checked={showPassword}
                            onChange={() => setShowPassword(!showPassword)}
                            className="w-4 h-4 text-indigo-600 border-gray-300 rounded"
                        />
                        <label className="ml-2 text-sm text-gray-600">Show Password</label>
                    </div>
                </animated.div>

                <div>
                    <button
                        type="submit"
                        className="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        disabled={processing}
                    >
                        {processing ? "Saving..." : "Save Changes"}
                    </button>
                </div>
            </form>
        </div>
        </DashboardLayout>
    );
}
