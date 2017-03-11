#include<bits/stdc++.h>
using namespace std;
int main(int argc, char const *argv[])
{
	int n;
	vector <int> v;
	cin>>n;
	for (int i = 0; i < n; ++i)
	{
		int k;
		cin>>k;
		v.push_back(k);
	}
	int sum;
	sum=0;
	for (int i = 0; i < n; ++i)
	{
		sum=sum+v[i]*(n-i);
	}
	sort(v.begin(),v.end());
	int sum2;
	sum2=0;
	for (int i = 0; i < n; ++i)
	{
		//v[i]=v[i]+v[i-1];
		sum2=sum2+v[i]*(n-i);
	}
	cout<<sum-sum2;
	return 0;
}