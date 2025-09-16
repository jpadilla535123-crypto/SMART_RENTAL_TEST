import React from 'react';
import { 
  BarChart3, 
  TrendingUp, 
  TrendingDown, 
  DollarSign, 
  Users, 
  Home,
  Calendar
} from 'lucide-react';

const Analytics = () => {
  const monthlyRevenue = [
    { month: 'Jan', revenue: 42000, expenses: 15000 },
    { month: 'Feb', revenue: 45000, expenses: 16000 },
    { month: 'Mar', revenue: 48000, expenses: 14000 },
    { month: 'Apr', revenue: 46000, expenses: 17000 },
    { month: 'May', revenue: 50000, expenses: 15500 },
    { month: 'Jun', revenue: 52000, expenses: 16500 }
  ];

  const occupancyData = [
    { property: 'Sunset Villa', occupancy: 95, trend: 'up' },
    { property: 'Downtown Lofts', occupancy: 88, trend: 'down' },
    { property: 'Garden Court', occupancy: 92, trend: 'up' },
    { property: 'Tech Hub', occupancy: 98, trend: 'stable' },
    { property: 'Historic Heights', occupancy: 85, trend: 'down' }
  ];

  const maintenanceStats = {
    thisMonth: 15,
    lastMonth: 12,
    avgCost: 185,
    totalCost: 2775
  };

  const getTrendIcon = (trend: string) => {
    switch (trend) {
      case 'up':
        return <TrendingUp className="w-4 h-4 text-green-500" />;
      case 'down':
        return <TrendingDown className="w-4 h-4 text-red-500" />;
      default:
        return <div className="w-4 h-4 bg-slate-300 rounded-full"></div>;
    }
  };

  const getTrendColor = (trend: string) => {
    switch (trend) {
      case 'up':
        return 'text-green-600';
      case 'down':
        return 'text-red-600';
      default:
        return 'text-slate-600';
    }
  };

  return (
    <div className="space-y-8">
      <div>
        <h1 className="text-3xl font-bold text-slate-800 mb-2">Analytics</h1>
        <p className="text-slate-600">Track performance metrics and insights across your portfolio.</p>
      </div>

      {/* Key Metrics */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between mb-4">
            <div className="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
              <DollarSign className="w-6 h-6 text-white" />
            </div>
            <div className="flex items-center space-x-1 text-green-600">
              <TrendingUp className="w-4 h-4" />
              <span className="text-sm font-medium">+8.2%</span>
            </div>
          </div>
          <h3 className="text-sm font-medium text-slate-500 mb-1">Monthly Revenue</h3>
          <p className="text-2xl font-bold text-slate-800">$52,000</p>
          <p className="text-sm text-slate-600 mt-1">vs $48,000 last month</p>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between mb-4">
            <div className="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
              <Home className="w-6 h-6 text-white" />
            </div>
            <div className="flex items-center space-x-1 text-green-600">
              <TrendingUp className="w-4 h-4" />
              <span className="text-sm font-medium">+2.1%</span>
            </div>
          </div>
          <h3 className="text-sm font-medium text-slate-500 mb-1">Avg Occupancy</h3>
          <p className="text-2xl font-bold text-slate-800">93.2%</p>
          <p className="text-sm text-slate-600 mt-1">across all properties</p>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between mb-4">
            <div className="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
              <Users className="w-6 h-6 text-white" />
            </div>
            <div className="flex items-center space-x-1 text-red-600">
              <TrendingDown className="w-4 h-4" />
              <span className="text-sm font-medium">-1.2%</span>
            </div>
          </div>
          <h3 className="text-sm font-medium text-slate-500 mb-1">Tenant Turnover</h3>
          <p className="text-2xl font-bold text-slate-800">8.5%</p>
          <p className="text-sm text-slate-600 mt-1">annual rate</p>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between mb-4">
            <div className="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
              <BarChart3 className="w-6 h-6 text-white" />
            </div>
            <div className="flex items-center space-x-1 text-green-600">
              <TrendingUp className="w-4 h-4" />
              <span className="text-sm font-medium">+12.3%</span>
            </div>
          </div>
          <h3 className="text-sm font-medium text-slate-500 mb-1">Net Profit</h3>
          <p className="text-2xl font-bold text-slate-800">$35,500</p>
          <p className="text-sm text-slate-600 mt-1">this month</p>
        </div>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {/* Revenue Chart */}
        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex justify-between items-center mb-6">
            <h2 className="text-xl font-semibold text-slate-800">Revenue vs Expenses</h2>
            <div className="flex items-center space-x-4 text-sm">
              <div className="flex items-center space-x-2">
                <div className="w-3 h-3 bg-blue-500 rounded-full"></div>
                <span className="text-slate-600">Revenue</span>
              </div>
              <div className="flex items-center space-x-2">
                <div className="w-3 h-3 bg-red-400 rounded-full"></div>
                <span className="text-slate-600">Expenses</span>
              </div>
            </div>
          </div>
          
          <div className="h-64 flex items-end justify-between space-x-2">
            {monthlyRevenue.map((data, index) => {
              const maxValue = Math.max(...monthlyRevenue.map(d => d.revenue));
              const revenueHeight = (data.revenue / maxValue) * 200;
              const expenseHeight = (data.expenses / maxValue) * 200;
              
              return (
                <div key={index} className="flex-1 flex flex-col items-center space-y-2">
                  <div className="flex items-end space-x-1 w-full">
                    <div 
                      className="bg-blue-500 rounded-t-sm flex-1"
                      style={{ height: `${revenueHeight}px` }}
                    ></div>
                    <div 
                      className="bg-red-400 rounded-t-sm flex-1"
                      style={{ height: `${expenseHeight}px` }}
                    ></div>
                  </div>
                  <span className="text-xs text-slate-600 font-medium">{data.month}</span>
                </div>
              );
            })}
          </div>
        </div>

        {/* Occupancy Rates */}
        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <h2 className="text-xl font-semibold text-slate-800 mb-6">Property Occupancy</h2>
          <div className="space-y-4">
            {occupancyData.map((property, index) => (
              <div key={index} className="flex items-center justify-between">
                <div className="flex items-center space-x-3">
                  <span className="font-medium text-slate-800 w-32">{property.property}</span>
                  <div className="w-32 bg-slate-200 rounded-full h-2">
                    <div 
                      className="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full"
                      style={{ width: `${property.occupancy}%` }}
                    ></div>
                  </div>
                </div>
                <div className="flex items-center space-x-2">
                  <span className="font-semibold text-slate-800">{property.occupancy}%</span>
                  {getTrendIcon(property.trend)}
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

      {/* Maintenance Analytics */}
      <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
        <h2 className="text-xl font-semibold text-slate-800 mb-6">Maintenance Analytics</h2>
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div className="text-center">
            <div className="text-3xl font-bold text-slate-800 mb-2">{maintenanceStats.thisMonth}</div>
            <div className="text-sm text-slate-600">Requests This Month</div>
            <div className={`text-xs mt-1 ${maintenanceStats.thisMonth > maintenanceStats.lastMonth ? 'text-red-600' : 'text-green-600'}`}>
              {maintenanceStats.thisMonth > maintenanceStats.lastMonth ? '+' : ''}
              {maintenanceStats.thisMonth - maintenanceStats.lastMonth} vs last month
            </div>
          </div>
          
          <div className="text-center">
            <div className="text-3xl font-bold text-slate-800 mb-2">${maintenanceStats.avgCost}</div>
            <div className="text-sm text-slate-600">Average Cost</div>
            <div className="text-xs text-green-600 mt-1">-$15 vs last month</div>
          </div>
          
          <div className="text-center">
            <div className="text-3xl font-bold text-slate-800 mb-2">${maintenanceStats.totalCost}</div>
            <div className="text-sm text-slate-600">Total This Month</div>
            <div className="text-xs text-amber-600 mt-1">+$420 vs last month</div>
          </div>
          
          <div className="text-center">
            <div className="text-3xl font-bold text-slate-800 mb-2">2.1</div>
            <div className="text-sm text-slate-600">Days Avg Resolution</div>
            <div className="text-xs text-green-600 mt-1">-0.3 days improvement</div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Analytics;