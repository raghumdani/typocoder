#include<bits/stdc++.h>
using namespace std;
int a[100010];
int main()
{
	int n;
	cin>>n;
	int temp1=0, temp2=0;
	int sum=0;
	for(int i=0;i<n;i++)
	{
		cin>>a[i];
		temp1+=a[i]+sum;
		sum+=a[i];
	}
	sum=0;
	sort(a, a+n);
	for(int i=0;i<n;i++)
	{
		temp2+=a[i]+sum;
		sum+=a[i];
	}
	cout<<temp1-temp2<<endl;
	
}