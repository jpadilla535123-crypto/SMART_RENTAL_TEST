import React from 'react';
import { 
  Building2, 
  Users, 
  Smartphone, 
  DollarSign, 
  TrendingUp, 
  AlertTriangle,
  CheckCircle,
  Clock
} from 'lucide-react';

const Dashboard = () => {
  const stats = [
    {
      title: 'Total Properties',
      value: '24',
      change: '+2 from last month',
      icon: Building2,
      color: 'from-blue-500 to-blue-600'
    },
    {
      title: 'Active Tenants',
      value: '89',
      change: '+5 from last month',
      icon: Users,
      color: 'from-green-500 to-green-600'
    },
    {
      title: 'Smart Devices',
      value: '156',
      change: '+12 from last month',
      icon: Smartphone,
      color: 'from-purple-500 to-purple-600'
    },
    {
      title: 'Monthly Revenue',
      value: '$48,320',
      change: '+8.2% from last month',
      icon: DollarSign,
      color: 'from-amber-500 to-amber-600'
    }
  ];

  const recentActivities = [
    {
      id: 1,
      type: 'maintenance',
      title: 'AC Repair Request',
      property: 'Sunset Villa #12',
      status: 'pending',
      time: '2 hours ago'
    },
    {
      id: 2,
      type: 'tenant',
      title: 'New Tenant Check-in',
      property: 'Ocean View #8',
      status: 'completed',
      time: '4 hours ago'
    },
    {
      id: 3,
      type: 'device',
      title: 'Smart Lock Battery Low',
      property: 'Garden Court #15',
      status: 'alert',
      time: '6 hours ago'
    },
    {
      id: 4,
      type: 'payment',
      title: 'Rent Payment Received',
      property: 'Downtown Loft #3',
      status: 'completed',
      time: '1 day ago'
    }
  ];

  const getStatusIcon = (status: string) => {
    switch (status) {
      case 'completed':
        return <CheckCircle className="w-4 h-4 text-green-500" />;
      case 'pending':
        return <Clock className="w-4 h-4 text-amber-500" />;
      case 'alert':
        return <AlertTriangle className="w-4 h-4 text-red-500" />;
      default:
        return <Clock className="w-4 h-4 text-slate-400" />;
    }
  };

  return (
    <div className="space-y-8">
      <div>
        <h1 className="text-3xl font-bold text-slate-800 mb-2">Dashboard</h1>
        <p className="text-slate-600">Welcome back! Here's what's happening with your properties.</p>
      </div>

      {/* Stats Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {stats.map((stat, index) => {
          const Icon = stat.icon;
          return (
            <div key={index} className="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
              <div className="p-6">
                <div className="flex items-center justify-between">
                  <div>
                    <p className="text-slate-500 text-sm font-medium">{stat.title}</p>
                    <p className="text-3xl font-bold text-slate-800 mt-1">{stat.value}</p>
                    <p className="text-sm text-green-600 mt-1">{stat.change}</p>
                  </div>
                  <div className={`w-14 h-14 bg-gradient-to-r ${stat.color} rounded-lg flex items-center justify-center`}>
                    <Icon className="w-7 h-7 text-white" />
                  </div>
                </div>
              </div>
            </div>
          );
        })}
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {/* Recent Activities */}
        <div className="bg-white rounded-xl shadow-lg border border-slate-200">
          <div className="p-6 border-b border-slate-200">
            <h2 className="text-xl font-semibold text-slate-800">Recent Activities</h2>
          </div>
          <div className="p-6">
            <div className="space-y-4">
              {recentActivities.map((activity) => (
                <div key={activity.id} className="flex items-start space-x-4 p-3 hover:bg-slate-50 rounded-lg transition-colors duration-200">
                  {getStatusIcon(activity.status)}
                  <div className="flex-1">
                    <h3 className="font-medium text-slate-800">{activity.title}</h3>
                    <p className="text-sm text-slate-500">{activity.property}</p>
                    <p className="text-xs text-slate-400 mt-1">{activity.time}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>

        {/* Property Overview */}
        <div className="bg-white rounded-xl shadow-lg border border-slate-200">
          <div className="p-6 border-b border-slate-200">
            <h2 className="text-xl font-semibold text-slate-800">Property Overview</h2>
          </div>
          <div className="p-6">
            <div className="space-y-4">
              <div className="flex justify-between items-center">
                <span className="text-slate-600">Occupied Units</span>
                <span className="font-semibold text-slate-800">89/96 (93%)</span>
              </div>
              <div className="w-full bg-slate-200 rounded-full h-2">
                <div className="bg-gradient-to-r from-green-400 to-green-500 h-2 rounded-full" style={{ width: '93%' }}></div>
              </div>
              
              <div className="flex justify-between items-center mt-6">
                <span className="text-slate-600">Maintenance Requests</span>
                <span className="font-semibold text-slate-800">8 Active</span>
              </div>
              <div className="w-full bg-slate-200 rounded-full h-2">
                <div className="bg-gradient-to-r from-amber-400 to-amber-500 h-2 rounded-full" style={{ width: '35%' }}></div>
              </div>

              <div className="flex justify-between items-center mt-6">
                <span className="text-slate-600">Smart Device Status</span>
                <span className="font-semibold text-slate-800">148/156 Online</span>
              </div>
              <div className="w-full bg-slate-200 rounded-full h-2">
                <div className="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full" style={{ width: '95%' }}></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Dashboard;