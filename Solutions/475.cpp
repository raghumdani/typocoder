#include<iostream>
#include<string.h>
#include<stdlib.h>
using namespace std;
int a[5000];
int compare(const void *a, const void *b)
{
	return (*(char *)a- *(char *)b);
}
int findCi(char s[], char f, int l, int h)
{
	int ci=l;
	for(int i=l+1;i<=h;i++)
		if(s[i]>f && s[i]< s[ci])
			ci=i;
	return ci;
	
}
void rearr(char s[])
{	
	int len=strlen(s);
	qsort(s,len, sizeof(s[0]),compare);
	bool isFinished=false;	
	while(!isFinished)
	{	int sum=0;
		for(int j=0;j<len;j++)
			sum=sum+(s[j]-'0')*(j+1);
			a[sum]++;
		int i;
		for(i=len-2;i>=0;i--)
			if(s[i] < s[i+1])
			break;
		if(i==-1)
			isFinished=true;
		else
			{
				int cI=findCi(s, s[i], i+1, len-1);
				swap(s[i], s[cI]);
				qsort(s+i+1, len-i-1, sizeof(s[0]), compare); 
			}
	}
}
void swap(char *x, char *y)
{
	char temp;
	temp=*x;
	*x=*y;
	*y=temp;
}
int kmax()
{
	int xmax=0;
	for(int i=1;i<=405;i++)
	if(a[i]>xmax)
		xmax=a[i];
	return xmax;
}
int main()
{
	int test;
	cin>>test;
	while(test--)
	{	for(int j=1;j<=405;j++)
			a[j]=0;
		char s[100];
		cin>>s;
		int n=strlen(s);
		//cout<<n<<endl;
		rearr(s);
		int k=kmax();
		cout<<k<<endl;
	}
}