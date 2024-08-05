import React, { useState } from "react";
import { useForm } from "@inertiajs/inertia-react";
import { useSpring, animated } from "react-spring";
import DashboardLayout from "../Layouts/DashboardLayout";

export default function EmailIntegration({ auth }) {
    const { data, setData, post, processing, errors } = useForm({
        smtp_server: "",
        smtp_port: "",
        smtp_user: "",
        smtp_password: "",
        api_key: "",
        api_secret: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/settings/email-integration", {
            onSuccess: () => {
                // Handle successful form submission (e.g., show a success message)
            },
        });
    };

    const springProps = useSpring({
        opacity: 1,
        transform: "translateY(0)",
    });

    return (
        <DashboardLayout>
            <div className="max-w-3xl mx-auto px-4 py-6">
                <h1 className="text-2xl font-semibold text-gray-800">
                    Email Integration Setup
                </h1>
                <form onSubmit={handleSubmit} className="mt-6 space-y-6">
                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            SMTP Server
                        </label>
                        <input
                            type="text"
                            value={data.smtp_server}
                            onChange={(e) =>
                                setData("smtp_server", e.target.value)
                            }
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.smtp_server && (
                            <p className="text-red-600 text-sm">
                                {errors.smtp_server}
                            </p>
                        )}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            SMTP Port
                        </label>
                        <input
                            type="number"
                            value={data.smtp_port}
                            onChange={(e) =>
                                setData("smtp_port", e.target.value)
                            }
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.smtp_port && (
                            <p className="text-red-600 text-sm">
                                {errors.smtp_port}
                            </p>
                        )}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            SMTP User
                        </label>
                        <input
                            type="text"
                            value={data.smtp_user}
                            onChange={(e) =>
                                setData("smtp_user", e.target.value)
                            }
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.smtp_user && (
                            <p className="text-red-600 text-sm">
                                {errors.smtp_user}
                            </p>
                        )}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            SMTP Password
                        </label>
                        <input
                            type="password"
                            value={data.smtp_password}
                            onChange={(e) =>
                                setData("smtp_password", e.target.value)
                            }
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.smtp_password && (
                            <p className="text-red-600 text-sm">
                                {errors.smtp_password}
                            </p>
                        )}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            API Key
                        </label>
                        <input
                            type="text"
                            value={data.api_key}
                            onChange={(e) => setData("api_key", e.target.value)}
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.api_key && (
                            <p className="text-red-600 text-sm">
                                {errors.api_key}
                            </p>
                        )}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700">
                            API Secret
                        </label>
                        <input
                            type="text"
                            value={data.api_secret}
                            onChange={(e) =>
                                setData("api_secret", e.target.value)
                            }
                            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        />
                        {errors.api_secret && (
                            <p className="text-red-600 text-sm">
                                {errors.api_secret}
                            </p>
                        )}
                    </div>

                    <animated.div style={springProps}>
                        <div>
                            <button
                                type="submit"
                                className="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                disabled={processing}
                            >
                                {processing ? "Saving..." : "Save Settings"}
                            </button>
                        </div>
                    </animated.div>
                </form>
            </div>
        </DashboardLayout>
    );
}
