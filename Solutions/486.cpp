//icpc
#include <bits/stdc++.h>
using namespace std;
#define ll unsigned long long
#define pb push_back
#define tr(c,it) for(auto it=c.begin();it!=c.end();it++)
#define all(c) (c).begin,(c).end()
#define max 10000000 // 10 to the power 7
int main()
{
	ll n,m,i,q,j;
	cin>>n;
	vector<ll>v(n);
	vector<ll>t(n);
	
	for(i=0;i<n;i++)
	    cin>>v[i];
	    
	for(i=0;i<n;i++)
	    cin>>t[i];
	    
	vector<ll>s(max); // total number of mangoes available after day i
	s[0]=0;
	s[1]=1;
	
	for(i=2;(i<max)&&(s[i-1]<=pow(10,10));i++)
	{
	    for(j=0;j<v.size();j++)
	    {
	        if(i%t[j]==0)
	            s[i]+=v[j];
	    }
	    s[i]+=s[i-1];
	}
	
	cin>>q;
	while(q--)
	{
	    cin>>m;
	    cout<<lower_bound(s.begin(),s.end(),m)-s.begin()<<endl;
	}
	return 0;
}
