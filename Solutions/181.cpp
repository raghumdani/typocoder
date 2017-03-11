#include<iostream>
using namespace std;

int gcd(int i,int j)
{
	if(j==0)
	return i;
	else
	return gcd(j,i%j);
}

int main()
{
int t, n,i,j;
int a[100000];
cin>>t;

while(t--)
{
cin>>n;
//cout<<"hai";
for(i=0;i<n;++i)
cin>>a[i];

//for(i=0;i<n;++i)
//cout<<a[i]<<endl;
//cout<<gcd(1,2)<<endl;
//cout<<gcd(a[0],a[1]);
int max=gcd(a[0],a[1]);
for(i=0;i<n-1;++i)
for(j=i+1;j<n;++j)
{//cout<<"bye";
if(gcd(a[i],a[j])>max)
max=gcd(a[i],a[j]);
}

cout<<max<<endl;
}

return 0;
}

