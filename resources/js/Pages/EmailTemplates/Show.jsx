import React from 'react';
import { usePage } from '@inertiajs/react';
import { useSpring, animated } from 'react-spring';
import DashboardLayout from '../../Layouts/DashboardLayout';

const Show = () => {
    const { template } = usePage().props;
    const [props, set] = useSpring(() => ({ opacity: 0 }));

    React.useEffect(() => {
        set({ opacity: 1 });
    }, [set]);

    return (
        <DashboardLayout>
            <animated.div style={props} className="p-6 bg-white shadow-md rounded-lg">
                <h1 className="text-2xl font-semibold">View Email Template</h1>
                <div className="mt-4">
                    <h2 className="text-xl font-semibold">Name</h2>
                    <p>{template.name}</p>
                </div>
                <div className="mt-4">
                    <h2 className="text-xl font-semibold">Thumbnail</h2>
                    {template.thumbnail && (
                        <img src={template.thumbnail} alt="Thumbnail" className="w-32 h-32 object-cover" />
                    )}
                </div>
                <div className="mt-4">
                    <h2 className="text-xl font-semibold">Content</h2>
                    <div dangerouslySetInnerHTML={{ __html: template.content }} />
                </div>
            </animated.div>
        </DashboardLayout>
    );
};

export default Show;
