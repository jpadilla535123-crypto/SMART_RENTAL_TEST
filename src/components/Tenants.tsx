import React, { useState } from 'react';
import { 
  Users, 
  Phone, 
  Mail, 
  Calendar, 
  Home,
  Search,
  Filter,
  Plus,
  MoreVertical,
  User,
  Clock,
  CheckCircle
} from 'lucide-react';

const Tenants = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [filterStatus, setFilterStatus] = useState('all');

  const tenants = [
    {
      id: 1,
      name: 'Sarah Johnson',
      email: 'sarah.johnson@email.com',
      phone: '(555) 123-4567',
      property: 'Sunset Villa #12',
      unit: 'Unit 12A',
      leaseStart: '2024-01-15',
      leaseEnd: '2025-01-14',
      rent: '$2,800',
      status: 'active',
      paymentStatus: 'current',
      avatar: 'https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
    },
    {
      id: 2,
      name: 'Michael Chen',
      email: 'michael.chen@email.com',
      phone: '(555) 234-5678',
      property: 'Downtown Loft #3',
      unit: 'Unit 3B',
      leaseStart: '2023-09-01',
      leaseEnd: '2024-08-31',
      rent: '$3,200',
      status: 'active',
      paymentStatus: 'current',
      avatar: 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
    },
    {
      id: 3,
      name: 'Emily Rodriguez',
      email: 'emily.rodriguez@email.com',
      phone: '(555) 345-6789',
      property: 'Garden Court #15',
      unit: 'Unit 15C',
      leaseStart: '2024-03-01',
      leaseEnd: '2025-02-28',
      rent: '$1,900',
      status: 'active',
      paymentStatus: 'late',
      avatar: 'https://images.pexels.com/photos/1130626/pexels-photo-1130626.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
    },
    {
      id: 4,
      name: 'David Thompson',
      email: 'david.thompson@email.com',
      phone: '(555) 456-7890',
      property: 'Tech Hub #22',
      unit: 'Unit 22A',
      leaseStart: '2023-12-01',
      leaseEnd: '2024-11-30',
      rent: '$4,100',
      status: 'active',
      paymentStatus: 'current',
      avatar: 'https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
    },
    {
      id: 5,
      name: 'Lisa Wong',
      email: 'lisa.wong@email.com',
      phone: '(555) 567-8901',
      property: 'Historic Heights #7',
      unit: 'Unit 7B',
      leaseStart: '2024-02-15',
      leaseEnd: '2025-02-14',
      rent: '$2,600',
      status: 'notice',
      paymentStatus: 'current',
      avatar: 'https://images.pexels.com/photos/1758144/pexels-photo-1758144.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
    },
    {
      id: 6,
      name: 'James Wilson',
      email: 'james.wilson@email.com',
      phone: '(555) 678-9012',
      property: 'Riverside Manor #8',
      unit: 'Unit 8A',
      leaseStart: '2023-06-01',
      leaseEnd: '2024-05-31',
      rent: '$2,400',
      status: 'expired',
      paymentStatus: 'current',
      avatar: 'https://images.pexels.com/photos/1043471/pexels-photo-1043471.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
    }
  ];

  const getStatusColor = (status: string) => {
    switch (status) {
      case 'active':
        return 'bg-green-100 text-green-800';
      case 'notice':
        return 'bg-amber-100 text-amber-800';
      case 'expired':
        return 'bg-red-100 text-red-800';
      default:
        return 'bg-slate-100 text-slate-800';
    }
  };

  const getPaymentStatusColor = (status: string) => {
    switch (status) {
      case 'current':
        return 'text-green-600';
      case 'late':
        return 'text-red-600';
      case 'pending':
        return 'text-amber-600';
      default:
        return 'text-slate-600';
    }
  };

  const getPaymentStatusIcon = (status: string) => {
    switch (status) {
      case 'current':
        return <CheckCircle className="w-4 h-4" />;
      case 'late':
        return <Clock className="w-4 h-4" />;
      case 'pending':
        return <Clock className="w-4 h-4" />;
      default:
        return <Clock className="w-4 h-4" />;
    }
  };

  const filteredTenants = tenants.filter(tenant => {
    const matchesSearch = tenant.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         tenant.email.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         tenant.property.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesFilter = filterStatus === 'all' || tenant.status === filterStatus;
    return matchesSearch && matchesFilter;
  });

  const tenantStats = {
    total: tenants.length,
    active: tenants.filter(t => t.status === 'active').length,
    late: tenants.filter(t => t.paymentStatus === 'late').length,
    expiring: tenants.filter(t => t.status === 'notice' || t.status === 'expired').length
  };

  return (
    <div className="space-y-8">
      <div className="flex justify-between items-center">
        <div>
          <h1 className="text-3xl font-bold text-slate-800 mb-2">Tenants</h1>
          <p className="text-slate-600">Manage tenant information, leases, and communications.</p>
        </div>
        <button className="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 flex items-center space-x-2 shadow-lg">
          <Plus className="w-5 h-5" />
          <span>Add Tenant</span>
        </button>
      </div>

      {/* Tenant Stats */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Total Tenants</p>
              <p className="text-3xl font-bold text-slate-800 mt-1">{tenantStats.total}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
              <Users className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Active</p>
              <p className="text-3xl font-bold text-green-600 mt-1">{tenantStats.active}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
              <CheckCircle className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Late Payments</p>
              <p className="text-3xl font-bold text-red-600 mt-1">{tenantStats.late}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
              <Clock className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Expiring Soon</p>
              <p className="text-3xl font-bold text-amber-600 mt-1">{tenantStats.expiring}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
              <Calendar className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>
      </div>

      {/* Search and Filter */}
      <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
        <div className="flex flex-col sm:flex-row gap-4">
          <div className="relative flex-1">
            <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" />
            <input
              type="text"
              placeholder="Search tenants..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
          </div>
          <div className="relative">
            <Filter className="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" />
            <select
              value={filterStatus}
              onChange={(e) => setFilterStatus(e.target.value)}
              className="pl-10 pr-8 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white"
            >
              <option value="all">All Status</option>
              <option value="active">Active</option>
              <option value="notice">Notice Given</option>
              <option value="expired">Expired</option>
            </select>
          </div>
        </div>
      </div>

      {/* Tenants List */}
      <div className="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
        <div className="overflow-x-auto">
          <table className="w-full">
            <thead className="bg-slate-50 border-b border-slate-200">
              <tr>
                <th className="text-left py-4 px-6 font-semibold text-slate-700">Tenant</th>
                <th className="text-left py-4 px-6 font-semibold text-slate-700">Property</th>
                <th className="text-left py-4 px-6 font-semibold text-slate-700">Lease</th>
                <th className="text-left py-4 px-6 font-semibold text-slate-700">Rent</th>
                <th className="text-left py-4 px-6 font-semibold text-slate-700">Status</th>
                <th className="text-left py-4 px-6 font-semibold text-slate-700">Payment</th>
                <th className="text-left py-4 px-6 font-semibold text-slate-700">Actions</th>
              </tr>
            </thead>
            <tbody className="divide-y divide-slate-200">
              {filteredTenants.map((tenant) => (
                <tr key={tenant.id} className="hover:bg-slate-50 transition-colors duration-200">
                  <td className="py-4 px-6">
                    <div className="flex items-center space-x-3">
                      <img 
                        src={tenant.avatar} 
                        alt={tenant.name}
                        className="w-10 h-10 rounded-full object-cover"
                      />
                      <div>
                        <p className="font-semibold text-slate-800">{tenant.name}</p>
                        <div className="flex items-center space-x-4 text-sm text-slate-500 mt-1">
                          <div className="flex items-center space-x-1">
                            <Mail className="w-3 h-3" />
                            <span>{tenant.email}</span>
                          </div>
                          <div className="flex items-center space-x-1">
                            <Phone className="w-3 h-3" />
                            <span>{tenant.phone}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td className="py-4 px-6">
                    <div className="flex items-center space-x-2">
                      <Home className="w-4 h-4 text-slate-400" />
                      <div>
                        <p className="font-medium text-slate-800">{tenant.property}</p>
                        <p className="text-sm text-slate-500">{tenant.unit}</p>
                      </div>
                    </div>
                  </td>
                  <td className="py-4 px-6">
                    <div className="flex items-center space-x-2">
                      <Calendar className="w-4 h-4 text-slate-400" />
                      <div className="text-sm">
                        <p className="text-slate-800">{new Date(tenant.leaseStart).toLocaleDateString()}</p>
                        <p className="text-slate-500">to {new Date(tenant.leaseEnd).toLocaleDateString()}</p>
                      </div>
                    </div>
                  </td>
                  <td className="py-4 px-6">
                    <p className="font-semibold text-slate-800">{tenant.rent}</p>
                  </td>
                  <td className="py-4 px-6">
                    <span className={`px-3 py-1 rounded-full text-sm font-medium capitalize ${getStatusColor(tenant.status)}`}>
                      {tenant.status}
                    </span>
                  </td>
                  <td className="py-4 px-6">
                    <div className={`flex items-center space-x-1 ${getPaymentStatusColor(tenant.paymentStatus)}`}>
                      {getPaymentStatusIcon(tenant.paymentStatus)}
                      <span className="text-sm font-medium capitalize">{tenant.paymentStatus}</span>
                    </div>
                  </td>
                  <td className="py-4 px-6">
                    <button className="text-slate-400 hover:text-slate-600 transition-colors">
                      <MoreVertical className="w-5 h-5" />
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
};

export default Tenants;