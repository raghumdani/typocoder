#include<bits/stdc++.h>
using namespace std;
vector <pair<long long int,long long int > >v;
long long int V[100005],T[100005];
long long int n;

long long int find(long long int t)
{
	long long int i,ans=0;
	for(i=0;i<n;i++)
	{
		ans+=( v[i].first * ( t / v[i].second ));
	}
	
	return ans;
}

long long int fun(long long int m)
{
	long long int first=0,last=10000000001,mid,fmid,fmid1;
	while(first<=last)
	{
		mid = (first+last)/2;
		fmid = find(mid);
		fmid1 = find(mid-1);
		if(fmid1<m && fmid>=m)
			return mid;
		else if(fmid<m)
			first = mid+1;
		else
			last = mid-1;
	}
	
}

int main()
{
	long long int i,q,m,w,t;
	scanf("%lld",&n);
	for(i=0;i<n;i++)
	{
		scanf("%lld",&V[i]);
	}
	for(i=0;i<n;i++)
	{
		scanf("%lld",&T[i]);
	}
	for(i=0;i<n;i++)
	{
		v.push_back(make_pair(V[i],T[i]));
	}
	scanf("%lld",&q);


	while(q--)
	{
		scanf("%lld",&m);
		printf("%lld\n",fun(m));
	}
	return 0;
}