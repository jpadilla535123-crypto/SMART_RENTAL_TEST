import React, { useState } from 'react';
import Sidebar from './components/Sidebar';
import Dashboard from './components/Dashboard';
import Properties from './components/Properties';
import SmartDevices from './components/SmartDevices';
import Tenants from './components/Tenants';
import Maintenance from './components/Maintenance';
import Analytics from './components/Analytics';

function App() {
  const [activeTab, setActiveTab] = useState('dashboard');

  const renderActiveComponent = () => {
    switch (activeTab) {
      case 'dashboard':
        return <Dashboard />;
      case 'properties':
        return <Properties />;
      case 'devices':
        return <SmartDevices />;
      case 'tenants':
        return <Tenants />;
      case 'maintenance':
        return <Maintenance />;
      case 'analytics':
        return <Analytics />;
      default:
        return <Dashboard />;
    }
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
      <div className="flex">
        <Sidebar activeTab={activeTab} setActiveTab={setActiveTab} />
        <main className="flex-1 ml-64">
          <div className="p-8">
            {renderActiveComponent()}
          </div>
        </main>
      </div>
    </div>
  );
}

export default App;