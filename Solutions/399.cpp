#include <bits/stdc++.h>
using namespace std;
int main(int argc, char const *argv[])
{
	int n;
	cin>>n;
	int a[n];
	long long sum1[n]={0}, sum2[n]={0}, ans1=0, ans2=0;
	for (int i = 0; i < n; ++i)
	{
		cin>>a[i];
		/* code */
	}
	sum1[0]=a[0];
	for (int i = 1; i < n; ++i)
	{
		sum1[i]=sum1[i-1]+a[i];
		/* code */
	}
	for (int i = 0; i < n; ++i)
	{
		ans1+=sum1[i];
		/* code */
	}
	sort(a,a+n);
	sum2[0]=a[0];
	for (int i = 1; i < n; ++i)
	{
		sum2[i]=sum2[i-1]+a[i];
		/* code */
	}
	for (int i = 0; i < n; ++i)
	{
		ans2+=sum2[i];
		/* code */
	}
	cout<<ans1-ans2<<endl;
	return 0;
}