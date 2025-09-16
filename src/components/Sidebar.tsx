import React from 'react';
import { 
  Home, 
  Building2, 
  Smartphone, 
  Users, 
  Wrench, 
  BarChart3, 
  Bell,
  Settings
} from 'lucide-react';

interface SidebarProps {
  activeTab: string;
  setActiveTab: (tab: string) => void;
}

const Sidebar: React.FC<SidebarProps> = ({ activeTab, setActiveTab }) => {
  const menuItems = [
    { id: 'dashboard', label: 'Dashboard', icon: Home },
    { id: 'properties', label: 'Properties', icon: Building2 },
    { id: 'devices', label: 'Smart Devices', icon: Smartphone },
    { id: 'tenants', label: 'Tenants', icon: Users },
    { id: 'maintenance', label: 'Maintenance', icon: Wrench },
    { id: 'analytics', label: 'Analytics', icon: BarChart3 },
  ];

  return (
    <div className="fixed left-0 top-0 h-full w-64 bg-white shadow-xl border-r border-slate-200">
      <div className="p-6 border-b border-slate-200">
        <div className="flex items-center space-x-3">
          <div className="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
            <Home className="w-6 h-6 text-white" />
          </div>
          <div>
            <h1 className="text-xl font-bold text-slate-800">SmartRent</h1>
            <p className="text-sm text-slate-500">Management System</p>
          </div>
        </div>
      </div>

      <nav className="mt-8">
        {menuItems.map((item) => {
          const Icon = item.icon;
          return (
            <button
              key={item.id}
              onClick={() => setActiveTab(item.id)}
              className={`w-full flex items-center space-x-3 px-6 py-3 text-left transition-all duration-200 hover:bg-slate-50 ${
                activeTab === item.id 
                  ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' 
                  : 'text-slate-600 hover:text-slate-800'
              }`}
            >
              <Icon className="w-5 h-5" />
              <span className="font-medium">{item.label}</span>
            </button>
          );
        })}
      </nav>

      <div className="absolute bottom-6 left-6 right-6">
        <div className="flex items-center space-x-3 p-3 bg-slate-50 rounded-lg">
          <div className="w-8 h-8 bg-slate-300 rounded-full"></div>
          <div className="flex-1">
            <p className="text-sm font-medium text-slate-800">John Manager</p>
            <p className="text-xs text-slate-500">Property Manager</p>
          </div>
          <Settings className="w-4 h-4 text-slate-400" />
        </div>
      </div>
    </div>
  );
};

export default Sidebar;