#include <bits/stdc++.h>
using namespace std;

int main() {
	int n;
	long long ans=0;
	cin>>n;
	vector<int>arr(n);
	for(int a1=0;a1<n;a1++)
	{
	    cin>>arr[a1];
	}
	sort(arr.begin(),arr.end());
	for(int a1=0;a1<n;a1++)
	{
	    ans=ans+(arr[a1]*(n-a1));
	}
	cout<<ans;
	return 0;
}